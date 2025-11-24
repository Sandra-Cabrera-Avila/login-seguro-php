<?php
$conexion = new mysqli("127.0.0.1", "root", "", "seguridad_aps", 3305);  //corregir hostname y puerto
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
