# 🔐 Sistema de Login Seguro con Registro de Intentos (PHP + MySQL)

Este proyecto implementa un sistema de autenticación con características de seguridad mejoradas, incluyendo bloqueo automático después de 3 intentos fallidos y registro de la actividad de inicio de sesión.  
Fue desarrollado con PHP, MySQL, JavaScript, HTML y CSS usando XAMPP.

---

## 🚀 Funcionalidades principales

✔ Inicio de sesión con validación en base de datos  
✔ Registro de intentos (usuario, fecha, IP, resultado)  
✔ Bloqueo automático después de 3 intentos fallidos  
✔ Redirección a página segura (home.php)  
✔ Manejo seguro de sesiones (login/logout)  
✔ Estilos propios con CSS y scripts en JavaScript  
✔ Base de datos `seguridad_aps` con tablas normalizadas  

---

## 📂 **Estructura del proyecto**



### 📁 `src/` contiene:
- bd.php  
- index.php  
- login.php  
- validar.php  
- registrar.php  
- logout.php  
- home.php  

### 📁 `static/` contiene:
- style.css  
- home.css  
- script.js  
- img/ (carpeta con imágenes)

---

## 🛢️ **Base de datos: `seguridad_aps`**

Incluye las siguientes tablas:

### 📌 **1. usuarios**
| Campo             | Tipo         | Descripción                        |
|-------------------|--------------|------------------------------------|
| id                | INT          | Primary key                        |
| usuario           | VARCHAR      | Nombre de usuario                  |
| password_hash     | VARCHAR      | Hash generado con password_hash()  |
| create_at         | DATETIME     | fecha y hora de creado             |
| intentos_fallidos | INT          | intentos registrados               |
| bloqueado_hasta   | DATETIME     | fecha y hora de desbloque          |


### 📌 **2. intentos_login**
| Campo     | Tipo        | Descripción                           |
|-----------|-------------|-----------------------------------------|
| id        | INT         | Primary key                             |
| usuario   | VARCHAR     | Usuario que intentó iniciar sesión      |
| fecha     | DATETIME    | Momento exacto del intento              |
| ip        | VARCHAR     | Dirección IP del intento                |
| resultado | VARCHAR     | exitoso / fallido / bloqueado           |

📄 El archivo SQL exportado se encuentra dentro de la carpeta **/database**.

---

## 🔐 **Lógica de seguridad implementada**

1. El usuario ingresa usuario + contraseña.  
2. Si fallan las credenciales → se registra en **intentos_login**.  
3. Después de **3 intentos fallidos consecutivos**, el usuario se **bloquea** automáticamente por un minuto.  
4. Si el usuario está bloqueado → el sistema no permite iniciar sesión.  
5. Si el login es exitoso → se redirige a `home.php` y se genera la sesión.  
6. `logout.php` destruye la sesión y devuelve al usuario al login.

---

## 🖼️ **Capturas de Pantalla**

Puedes incluirlas dentro de `/captures`, por ejemplo:

- `login.png`  
- `bloqueo.png`  
- `tabla-intentos.png`  


---

## 💻 **Tecnologías utilizadas**

- PHP 7/8  
- MySQL / phpMyAdmin  
- HTML5  
- CSS3  
- JavaScript  
- XAMPP  

---

## 👤 **Autor**

**Sandra Cabrera Ávila**  
Proyecto académico – Seguridad de Aplicaciones Web

---
