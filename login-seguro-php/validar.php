<?php
session_start();
include 'bd.php';

$usuario = trim($_POST['usuario']);
$password = $_POST['password'];

$stmt = $conexion->prepare("SELECT password_hash FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 0) {
    die("Usuario o contraseña incorrectos.");
}

$stmt->bind_result($hash);
$stmt->fetch();

if (!password_verify($password, $hash)) {
    die("Usuario o contraseña incorrectos.");
}

$_SESSION['usuario'] = $usuario;
header("Location: home.php");
exit;
?>
