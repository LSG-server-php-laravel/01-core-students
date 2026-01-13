# PetRescue API — Demo (Auth API con Sanctum + Form Requests)

## 🎯 Objetivo

Añadir **autenticación por token** a la API usando **Laravel Sanctum**, aplicando además **Form Requests** para validar correctamente:

- Registro de usuarios.
- Login de usuarios.

Y proteger las rutas de escritura de la API.

---

## 🔐 Funcionalidades de Auth

La API debe permitir:

- **Registro** de usuarios  
  `POST /api/auth/register`

- **Login** de usuarios  
  `POST /api/auth/login`

- **Perfil del usuario autenticado**  
  `GET /api/auth/me` (protegido)

- **Logout (revocar token)**  
  `POST /api/auth/logout` (protegido)

---

## 🛡 Protección de rutas de la API

- **Rutas públicas**

  - Listar mascotas.
  - Ver detalle de una mascota.

- **Rutas protegidas (requieren token)**
  - Crear mascota.
  - Actualizar mascota.
  - Eliminar mascota.

---

## 📂 Archivos implicados

### Controlador

- `app/Http/Controllers/Api/AuthController.php`
  - Métodos: `register`, `login`, `me`, `logout`
  - No contiene validación manual.

---

### Form Requests

- `app/Http/Requests/RegisterRequest.php`

  - Valida datos de registro (name, email, password).

- `app/Http/Requests/LoginRequest.php`
  - Valida credenciales de login (email, password).

---

### Modelo

- `app/Models/User.php`
  - Usa el trait `HasApiTokens` para soportar tokens de Sanctum.

---

### Rutas

- `routes/api.php`
  - Rutas de Auth bajo prefijo `/auth`.
  - Uso del middleware `auth:sanctum` para rutas protegidas.

---

## 🛠 Comandos utilizados

### Instalar Sanctum

```bash
./vendor/bin/sail composer require laravel/sanctum
```

### Crear los Form Requests

```bash
./vendor/bin/sail artisan make:request RegisterRequest
./vendor/bin/sail artisan make:request LoginRequest
```

### Crear el Controller

```bash
./vendor/bin/sail artisan make:controller AuthController
```
