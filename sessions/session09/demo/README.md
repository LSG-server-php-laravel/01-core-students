# PetRescue API — Demo (Controladores API y Rutas CRUD)

## 🎯 Objetivo

Crear un controlador API para el modelo `Pet` y exponer un CRUD completo a través de rutas REST:

- `GET /api/pets` → listar mascotas
- `GET /api/pets/{pet}` → ver una mascota
- `POST /api/pets` → crear mascota
- `PUT /api/pets/{pet}` → actualizar mascota
- `DELETE /api/pets/{pet}` → eliminar mascota

> En esta demo todavía no hay:
>
> - Validación avanzada (eso llega en Demo siguiente).
> - Autenticación ni permisos (eso llega en Demos siguientes).

---

## 📂 Archivos implicados

- `routes/api.php`

  - Registro de `Route::apiResource('pets', PetController::class);`

- `app/Http/Controllers/PetController.php`

  - Métodos: `index`, `show`, `store`, `update`, `destroy`.

- `app/Models/Pet.php`
  - Debe tener definidos los campos `fillable` adecuados para permitir `create` y `update`.

### 🛠 Comando para generar el controlador automáticamente

```bash
./vendor/bin/sail artisan make:controller PetController --api
```

Flag:

- `--api`: Genera solo los métodos API (sin `create` ni `edit`)

---

## 🧪 Endpoints de prueba (sin auth)

- Listar todas las mascotas  
  Método: GET  
  URL: `/api/pets`

- Ver una mascota concreta  
  Método: GET  
  URL: `/api/pets/{id}`

- Crear una mascota  
  Método: POST  
  URL: `/api/pets`  
  Cuerpo JSON sugerido:

  - name
  - species
  - age
  - status
  - description
  - created_by (opcional)
  - adopted_by (opcional)

- Actualizar una mascota  
  Método: PUT  
  URL: `/api/pets/{id}`

- Eliminar una mascota  
  Método: DELETE  
  URL: `/api/pets/{id}`

---

## 🔜 Próximos pasos

- **Demo siguiente**: Añadir validación con Form Requests (`StorePetRequest`, `UpdatePetRequest`) para evitar datos inválidos.
