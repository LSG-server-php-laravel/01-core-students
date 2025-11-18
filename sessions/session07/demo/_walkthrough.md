# 🎬 Guion — Migraciones (PetRescue, Laravel Sail)

## 0) Introducción (2 min)

- Recordatorio de que Demo 1 configuró Laravel + Sail + MySQL.
- Objetivo: tabla `pets` lista para el CRUD.
- Añadimos `created_by` y `adopted_by`.

## 1) Repaso de migraciones (3 min)

- Mostrar archivo de migración de `users`.
- Explicar qué hacen `up()` y `down()`.

Explicación: la migración es la definición en código de la estructura de la base de datos. `up()` aplica los cambios (crea/modifica tablas) y `down()` los revierte para poder deshacer cambios en desarrollo o pruebas.

## 2) Crear migración de pets (5 min)

```bash
./vendor/bin/sail artisan make:migration create_pets_table --create=pets
```

- Explicar los campos:
  - name, species, age, status, description
- Explicar las foreign keys:

  ```php
  $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
  $table->foreignId('adopted_by')->nullable()->constrained('users')->nullOnDelete();
  ```

Explicación: aquí definimos la estructura que necesitamos para la entidad `pets`.

- Campos básicos: `name`, `species`, `age`, `status` y `description` sirven para almacenar la información visible de la mascota. Elegid tipos adecuados (`string`, `integer`, `text`, `enum` o `string` para `status`) según la necesidad.
- Relaciones/foreign keys: `created_by` y `adopted_by` referencian la tabla `users`. Usamos `nullable()` para permitir que una mascota no tenga adoptante aún, y `nullOnDelete()` para que si el usuario se borra, el campo se ponga a NULL (evita borrados en cascada inesperados).
- Índices y rendimiento: si vais a buscar por `status` o `species` con frecuencia, pensad en añadir índices (`$table->index('status');`).
- Timestamps: normalmente añadimos `$table->timestamps();` para tener `created_at` y `updated_at`.

## 3) Ejecutar migraciones (5–7 min)

```bash
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan migrate:status
```

Explicación:

- `sail up -d` inicia los contenedores en segundo plano si no están ya arrancados. Necesario para que Artisan se conecte a la BD dentro del contenedor.
- `artisan migrate` aplica todas las migraciones pendientes. Si hay errores revisad la conexión a la base de datos (`.env`) y los logs (`./vendor/bin/sail artisan tinker` o revisar `storage/logs`).
- `migrate:status` muestra qué migraciones se han ejecutado y cuáles no; útil para confirmar que la nueva migración fue aplicada.

## 4) Rollback (5 min)

```bash
./vendor/bin/sail artisan migrate:rollback
./vendor/bin/sail artisan migrate
```

Explicación:

- `migrate:rollback` deshace la última "batch" de migraciones (las migraciones más recientes). Es útil durante el desarrollo cuando necesitáis corregir la migración.
- Si queréis deshacer N pasos podéis usar `migrate:rollback --step=2`.
- Tras corregir la migración podéis volver a ejecutar `migrate`.
- Precaución: no usar `rollback` en producción salvo que sepáis exactamente el impacto sobre los datos; en entornos productivos preferid migraciones que sean seguras o migraciones de solo lectura para datos críticos.

## 5) Cierre (2 min)

- BD lista para la siguiente demo.
