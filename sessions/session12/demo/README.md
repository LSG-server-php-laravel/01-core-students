# PetRescue API — Demo (FormRequests `authorize()` + Policies)

## 🎯 Objetivo

Introducir **autorización correcta en Laravel** combinando:

- `authorize()` de **Form Requests** para reglas de **contexto**.
- **Policies** para reglas de **dominio por recurso**.

La demo muestra cómo separar responsabilidades sin mezclar lógica.

---

## 🧠 Regla funcional de la demo

- Si una mascota tiene `status = adopted`:
  - **Nadie** puede editarla ni borrarla.
- Si una mascota **no** está adoptada:
  - **Solo el usuario creador** puede editarla o borrarla.

---

## 📂 Archivos implicados

### Policies

- `app/Policies/PetPolicy.php`

  - Define quién puede **editar o borrar una mascota concreta**.
  - Regla: solo el creador (`created_by`).

- `app/Providers/AuthServiceProvider.php`
  - Registro explícito de la policy para el modelo `Pet`.

---

### Form Requests

- `app/Http/Requests/StorePetRequest.php`

  - Autoriza solo a usuarios autenticados.
  - Valida los datos de creación.

- `app/Http/Requests/UpdatePetRequest.php`

  - Bloquea la petición si la mascota ya está adoptada.
  - Permite actualización parcial (`sometimes`).

- `app/Http/Requests/DestroyPetRequest.php`
  - Bloquea el borrado si la mascota está adoptada.

---

### Controller

- `app/Http/Controllers/Api/PetController.php`
  - Usa Form Requests para:
    - validar datos,
    - filtrar acciones no válidas.
  - Usa Policies para decidir:
    - si el usuario puede actuar sobre **esa mascota concreta**.

---

### Rutas

- `routes/api.php`
  - Lectura pública: listar y ver mascotas.
  - Escritura protegida con `auth:sanctum`.

---

## 🛠 Comandos utilizados (Sail)

### Crear la Policy

```bash
./vendor/bin/sail artisan make:policy PetPolicy --model=Pet
```

### Crear el Form Request

```bash
./vendor/bin/sail artisan make:request DestroyPetRequest
```
