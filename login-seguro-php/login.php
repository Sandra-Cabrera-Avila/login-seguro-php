<?php
session_start();
include 'bd.php';

// --- IP corregida (::1 → 127.0.0.1) ---
$ip = ($_SERVER['REMOTE_ADDR'] === "::1") ? "127.0.0.1" : $_SERVER['REMOTE_ADDR'];

$usuario = trim($_POST['usuario']);
$password = trim($_POST['password']);

// --- 1. VERIFICAR BLOQUEO ---
$check = $conexion->prepare("
    SELECT intentos_fallidos, bloqueado_hasta 
    FROM usuarios 
    WHERE usuario=?
");
$check->bind_param("s", $usuario);
$check->execute();
$check->store_result();

$intentos = 0;
$bloqueado_hasta = null;

if ($check->num_rows > 0) {

    $check->bind_result($intentos, $bloqueado_hasta);
    $check->fetch();

    // Si está bloqueado
    if ($bloqueado_hasta && strtotime($bloqueado_hasta) > time()) {

        registrarIntento($conexion, $usuario, $ip, "BLOQUEADO (INTENTO DURANTE BLOQUEO)");

        $faltan = strtotime($bloqueado_hasta) - time();
        $_SESSION['mensaje'] = [
            "tipo" => "error", 
            "texto" => "⛔ Usuario bloqueado. Espera $faltan segundos."
        ];

        $check->close();
        header("Location: index.php");
        exit();
    }
}
$check->close();

// --- 2. VERIFICAR USUARIO ---
$stmt = $conexion->prepare("
    SELECT id, usuario, password_hash 
    FROM usuarios 
    WHERE usuario=?
");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->store_result();

$id = 0;
$userDB = "";
$passwordHashDB = "";

if ($stmt->num_rows > 0) {

    $stmt->bind_result($id, $userDB, $passwordHashDB);
    $stmt->fetch();

    // ✔ Contraseña correcta
    if (password_verify($password, $passwordHashDB)) {

        $stmt->close();

        // Resetear intentos
        $conexion->query("
            UPDATE usuarios 
            SET intentos_fallidos=0, bloqueado_hasta=NULL 
            WHERE usuario='$usuario'
        ");

        registrarIntento($conexion, $usuario, $ip, "EXITO");

        $_SESSION['usuario'] = $userDB;
        $_SESSION['id'] = $id;

        header("Location: home.php");
        exit();
    }

    // ❌ Contraseña incorrecta
    $stmt->close();
    $intentos++;

    if ($intentos >= 3) {

        $bloqueo = date("Y-m-d H:i:s", time() + 60);

        $update = $conexion->prepare("
            UPDATE usuarios 
            SET intentos_fallidos=?, bloqueado_hasta=? 
            WHERE usuario=?
        ");
        $update->bind_param("iss", $intentos, $bloqueo, $usuario);
        $update->execute();
        $update->close();

        // SOLO aquí debe decir BLOQUEADO
        registrarIntento($conexion, $usuario, $ip, "BLOQUEADO");

        $_SESSION['mensaje'] = [
            "tipo" => "error",
            "texto" => "❌ 3 intentos fallidos. Usuario bloqueado 1 minuto."
        ];

        header("Location: index.php");
        exit();
    }

    // Entre 1 y 2 fallos → FALLIDO normal
    $update = $conexion->prepare("
        UPDATE usuarios 
        SET intentos_fallidos=? 
        WHERE usuario=?
    ");
    $update->bind_param("is", $intentos, $usuario);
    $update->execute();
    $update->close();

    registrarIntento($conexion, $usuario, $ip, "FALLIDO");

    $_SESSION['mensaje'] = [
        "tipo" => "error",
        "texto" => "❌ Contraseña incorrecta (intento $intentos de 3)"
    ];

    header("Location: index.php");
    exit();

} else {

    $stmt->close();

    registrarIntento($conexion, $usuario, $ip, "USUARIO NO EXISTE");

    $_SESSION['mensaje'] = [
        "tipo" => "advertencia",
        "texto" => "⚠️ El usuario no existe"
    ];

    header("Location: index.php");
    exit();
}

$conexion->close();


// --- FUNCIÓN ---
function registrarIntento($conexion, $usuario, $ip, $resultado){

    if (trim($usuario) == "") {
        $usuario = "DESCONOCIDO";
    }

    $fecha = date("Y-m-d H:i:s");

    $q = $conexion->prepare("
        INSERT INTO intentos_login(usuario, fecha, ip, resultado) 
        VALUES(?,?,?,?)
    ");
    $q->bind_param("ssss", $usuario, $fecha, $ip, $resultado);
    $q->execute();
    $q->close();
}
?>
