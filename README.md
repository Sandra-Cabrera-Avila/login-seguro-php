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
  https://github.com/Sandra-Cabrera-Avila/login-seguro-php/blob/main/login-seguro-php/bd.php
- index.php
  https://github.com/Sandra-Cabrera-Avila/login-seguro-php/blob/main/login-seguro-php/index.php  
- login.php
  https://github.com/Sandra-Cabrera-Avila/login-seguro-php/blob/main/login-seguro-php/login.php  
- validar.php
  https://github.com/Sandra-Cabrera-Avila/login-seguro-php/blob/main/login-seguro-php/validar.php  
- registrar.php
  https://github.com/Sandra-Cabrera-Avila/login-seguro-php/blob/main/login-seguro-php/registrar.php  
- logout.php
  https://github.com/Sandra-Cabrera-Avila/login-seguro-php/blob/main/login-seguro-php/logout.php  
- home.php
  https://github.com/Sandra-Cabrera-Avila/login-seguro-php/blob/main/login-seguro-php/home.php  

### 📁 `static/` contiene:
- style.css
  https://github.com/Sandra-Cabrera-Avila/login-seguro-php/blob/main/login-seguro-php/static/home.css  
- home.css
  https://github.com/Sandra-Cabrera-Avila/login-seguro-php/blob/main/login-seguro-php/static/home.css  
- script.js
  https://github.com/Sandra-Cabrera-Avila/login-seguro-php/blob/main/login-seguro-php/static/script.js  
- img/
  https://github.com/Sandra-Cabrera-Avila/login-seguro-php/tree/main/login-seguro-php/static/img

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

### Pagina web
- `login.png`
   <img width="1920" height="1080" alt="Captura de pantalla 2025-11-23 194129" src="https://github.com/user-attachments/assets/300376dc-d705-4c88-9963-f9473ab5ce7e" />
   <img width="1920" height="1080" alt="Captura de pantalla 2025-11-23 194140" src="https://github.com/user-attachments/assets/9056e777-c525-4207-84c6-aed71001dd41" />

- `bloqueo`
   <img width="1920" height="1080" alt="Captura de pantalla 2025-11-23 195054" src="https://github.com/user-attachments/assets/b20fd173-8bf0-4b6f-aabc-56421dd0ef2c" />
   <img width="1920" height="1080" alt="Captura de pantalla 2025-11-23 195120" src="https://github.com/user-attachments/assets/bf988012-e1a5-44a1-b400-c41d93eb5495" />
   <img width="1920" height="1080" alt="Captura de pantalla 2025-11-23 195442" src="https://github.com/user-attachments/assets/f3123076-1678-44c5-9dbe-fb61b5b82fb8" />

- `pagina principal`
   <img width="1920" height="1080" alt="Captura de pantalla 2025-11-23 194248" src="https://github.com/user-attachments/assets/4ca72e21-a073-4f25-8ba6-48aeba4f28e7" />
   <img width="1920" height="1080" alt="Captura de pantalla 2025-11-23 194302" src="https://github.com/user-attachments/assets/4f491f6e-1922-43dc-9547-007810924860" />
   <img width="1920" height="1080" alt="Captura de pantalla 2025-11-23 194315" src="https://github.com/user-attachments/assets/c5c83646-dfa8-4045-977e-b0b6eb22b759" />

  
### Base de Datos
- `usuarios`
  <img width="1920" height="1080" alt="Captura de pantalla 2025-11-23 194338" src="https://github.com/user-attachments/assets/81aea3f5-e006-4e12-a290-d037fa57619c" />
  
- `intentos_login`
   <img width="1920" height="1080" alt="Captura de pantalla 2025-11-23 194514" src="https://github.com/user-attachments/assets/efaa382f-038e-4ba0-8814-d6608091dd7d" />
   
---

## 💻 **Tecnologías utilizadas**

- PHP 8.0.30  
- MySQL / phpMyAdmin  
- HTML5  
- CSS3  
- JavaScript  
- XAMPP  

---

## 👤 **Autor**

**Sandra Cabrera Avila**  
Proyecto académico – Seguridad de Aplicaciones Web

---
