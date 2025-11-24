<?php
session_start();
if(isset($_SESSION['mensaje'])){
    $tipo = $_SESSION['mensaje']['tipo'];
    $texto = $_SESSION['mensaje']['texto'];
    unset($_SESSION['mensaje']);
    $color = ($tipo==="error")?"#ff4d4d":(($tipo==="advertencia")?"#f5a623":"#4CAF50");
    echo "<div style='
        position:fixed;top:20px;left:50%;
        transform:translateX(-50%);
        background:$color;color:#fff;padding:15px 25px;
        border-radius:8px;font-family:Poppins,sans-serif;font-size:16px;
        box-shadow:0 4px 10px rgba(0,0,0,0.2);
        z-index:9999;animation:fadeOut 5s forwards;'>$texto</div>
        <style>@keyframes fadeOut{0%{opacity:1}80%{opacity:1}100%{opacity:0}}</style>";
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login / Registro</title>
<link rel="stylesheet" href="static/style.css">
</head>
<body>

<div class="container" id="main">

    <!-- LOGIN -->
    <div class="form-box" id="loginBox">
        <form action="login.php" method="POST" style="width:80%;text-align:center;">
            <h2>Iniciar Sesión</h2>
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">INGRESAR</button>
        </form>
    </div>

    <!-- REGISTRO -->
    <div class="form-box" id="registerBox">
        <form action="registrar.php" method="POST" style="width:80%;text-align:center;">
            <h2>Crear Cuenta</h2>
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">REGISTRAR</button>
        </form>
    </div>

    <!-- OVERLAY -->
    <div class="overlay" id="overlayPanel">
        <div>
            <h2>Bienvenido!</h2>
            <p>Puedes registrarte o iniciar sesión para acceder al sistema.</p>
            <button id="toggleBtn">REGISTRARSE</button>
        </div>
    </div>

</div>

<script>
const btn = document.getElementById('toggleBtn');
const container = document.getElementById('main');
let state = 0; // 0 = login, 1 = register

btn.addEventListener('click', () => {
    container.classList.toggle('right-active');
    state = !state;
    btn.textContent = state ? "INICIAR SESIÓN" : "REGISTRARSE";
});
</script>

</body>
</html>
