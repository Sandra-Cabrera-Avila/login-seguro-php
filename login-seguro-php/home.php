<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home - Seguridad de Aplicaciones</title>
<link rel="stylesheet" href="static/home.css">

</head>
<body>
<header>
    <h1>Técnicas de Troubleshooting en la Seguridad de Aplicaciones</h1>
    <p>Identifica, analiza y resuelve problemas de seguridad en aplicaciones web</p>
</header>

<div class="container">
    <!-- Qué es troubleshooting -->
    <section>
        <h2>¿Qué es el troubleshooting en seguridad?</h2>
        <p>El <strong>troubleshooting</strong> en seguridad de aplicaciones consiste en la identificación, análisis y resolución de problemas de seguridad que puedan afectar la integridad, confidencialidad o disponibilidad de los sistemas. Esto permite prevenir ataques, proteger datos y garantizar que la aplicación funcione de manera segura.</p>
    </section>

    <!-- Importancia -->
    <section>
        <h2>Importancia</h2>
        <ul>
            <li>Reduce el riesgo de ataques que comprometan datos sensibles.</li>
            <li>Cumple con normativas de seguridad y estándares (OWASP, ISO 27001).</li>
            <li>Mejora la confianza de los usuarios y la reputación de la aplicación.</li>
        </ul>
    </section>

    <!-- Técnicas importantes -->
    <section>
        <h2>Técnicas más importantes</h2>
        <ul>
            <li><strong>Revisión de logs:</strong> Monitorear eventos, errores y accesos sospechosos.</li>
            <li><strong>Detección de patrones sospechosos:</strong> Identificar intentos de fuerza bruta, inyecciones y accesos no autorizados.</li>
            <li><strong>Monitoreo de seguridad:</strong> Uso de SIEM o herramientas de alertas en tiempo real.</li>
            <li><strong>Pruebas de penetración:</strong> Detectar vulnerabilidades antes de que sean explotadas.</li>
            <li><strong>Auditorías de código:</strong> Revisar el código para encontrar errores de seguridad.</li>
            <li><strong>Documentación de incidentes:</strong> Registrar todos los problemas y soluciones para referencia futura.</li>
            <li><strong>Actualización constante:</strong> Mantener sistemas y librerías al día para prevenir vulnerabilidades conocidas.</li>
        </ul>
    </section>

    <!-- Herramientas -->
    <section>
        <h2>Herramientas útiles</h2>
        <div class="cards">
            <div class="card">
                <img src="static/img/splunk.png" alt="Splunk">
                <h3>Splunk / ELK</h3>
                <p>Análisis de logs y correlación de eventos para detectar anomalías de seguridad.</p>
            </div>
            <div class="card">
                <img src="static/img/fail2ban.png" alt="Fail2Ban">
                <h3>Fail2Ban</h3>
                <p>Bloquea automáticamente IPs que generan múltiples intentos fallidos.</p>
            </div>
            <div class="card">
                <img src="static/img/burp.png" alt="Burp Suite">
                <h3>OWASP ZAP / Burp Suite</h3>
                <p>Herramientas para pruebas de penetración automatizadas.</p>
            </div>
        </div>
    </section>

    <!-- Caso práctico -->
    <section>
        <h2>Caso práctico</h2>
        <table class="case-table">
            <tr>
                <th>Problema</th>
                <th>Técnicas de troubleshooting</th>
                <th>Solución</th>
            </tr>
            <tr>
                <td class="problem">Miles de intentos de login desde una misma IP, posible ataque de fuerza bruta.</td>
                <td class="techniques">
                    Revisión de logs, detección de patrones sospechosos, uso de SIEM.
                </td>
                <td class="solution">
                    Bloquear IP, implementar CAPTCHA, configurar alertas tempranas.
                </td>
            </tr>
        </table>

        <!-- Mini-diagrama del proceso -->
        <div class="diagram">
            <h2>Flujo de troubleshooting</h2>
            <img src="static/img/diagrama.png" alt="Diagrama flujo problema → diagnóstico → solución">
        </div>
    </section>

    <!-- Buenas prácticas -->
    <section>
        <h2>Buenas prácticas</h2>
        <ul>
            <li>Configurar alertas automáticas ante comportamientos sospechosos.</li>
            <li>Implementar autenticación multifactor y reglas de acceso según roles.</li>
            <li>Auditar periódicamente la aplicación y sus componentes.</li>
            <li>Monitorear continuamente los logs y eventos de seguridad.</li>
        </ul>
    </section>
    <a href="logout.php" class="btn-logout">Cerrar sesión</a>
</div>
</body>
</html>
