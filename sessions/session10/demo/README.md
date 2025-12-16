# PetRescue API — Demo (Validación con Form Requests)

## 🎯 Objetivo

Añadir **validación de datos** a la API de mascotas utilizando **Form Requests**, separando la lógica de validación del controlador y dejando el código más limpio y mantenible.

En esta demo se añade validación para:

- Crear una mascota (`store`)
- Actualizar una mascota (`update`)

> A partir de ahora:
>
> - El controlador **no valida manualmente**.
> - La validación vive en clases dedicadas.

---

## 📂 Archivos implicados

### `app/Http/Requests/StorePetRequest.php`

- Define las reglas de validación para crear una mascota.
- Todos los campos obligatorios se validan con `required`.
- Se valida la existencia de usuarios para claves foráneas.

---

### `app/Http/Requests/UpdatePetRequest.php`

- Define las reglas de validación para actualizar una mascota.
- Usa `sometimes + required` para permitir actualizaciones parciales.
- Solo se valida lo que llega en la petición.

---

### `app/Http/Controllers/Api/PetController.php`

Cambios principales:

- El método `store` recibe un `StorePetRequest`.
- El método `update` recibe un `UpdatePetRequest`.

---

### `app/Models/Pet.php`

- Debe tener correctamente definidos los campos `fillable`.
- No cambia en esta demo, pero es clave para que `create` y `update` funcionen correctamente.

---

## 🛠 Comandos para generar los ficheros

### Crear los Form Requests

```bash
./vendor/bin/sail artisan make:request StorePetRequest
./vendor/bin/sail artisan make:request UpdatePetRequest
```
