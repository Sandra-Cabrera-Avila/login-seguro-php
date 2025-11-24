<?php
session_start();
include 'bd.php';

$usuario = trim($_POST['usuario']);
$password = trim($_POST['password']);
$ip = $_SERVER['REMOTE_ADDR'];

// Verificar si usuario existe
$stmt = $conexion->prepare("SELECT id FROM usuarios WHERE usuario=?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){
    $_SESSION['mensaje'] = ["tipo"=>"advertencia","texto"=>"⚠️ El usuario ya existe"];
    header("Location: index.php");
    exit();
}

// Crear hash seguro y guardar
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conexion->prepare("INSERT INTO usuarios(usuario,password_hash) VALUES(?,?)");
$stmt->bind_param("ss", $usuario, $passwordHash);
$stmt->execute();

$_SESSION['mensaje'] = ["tipo"=>"exito","texto"=>"✅ Usuario registrado correctamente"];
header("Location: index.php");
exit();
?>
