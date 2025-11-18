# PetRescue API — Demo (Migraciones) con Laravel Sail

## 🎯 Objetivo

Definir el esquema inicial de la base de datos creando la tabla `pets` con:

- Campos básicos del dominio (name, species, age, status, description)
- Quién creó la mascota (`created_by`)
- Quién la adoptó (`adopted_by`)
- Sin índices adicionales
- Migraciones ejecutadas con Laravel Sail

## 📌 Requisitos

- Docker + Docker Compose v2
- Proyecto inicializado con Laravel + Sail
- `.env` configurado con conexión MySQL (ver Demo 1)

## ⚙️ Pasos rápidos

### 1. Crear la migración de `pets`

```bash
./vendor/bin/sail artisan make:migration create_pets_table
```

### 2. Pegar el contenido de la migración

El archivo correspondiente se encuentra en:

```text
database/migrations/XXXX_XX_XX_XXXXXX_create_pets_table.php
```

### 3. Levantar contenedores y migrar

```bash
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
```

### 4. Verificar migraciones

```bash
./vendor/bin/sail artisan migrate:status
```

Muestra qué migraciones se han ejecutado y cuáles están pendientes.

### 5. Refrescar la BBDD (solo desarrollo)

```bash
./vendor/bin/sail artisan migrate:fresh
```

> ⚠️ **Cuidado:** Este comando **borra todas las tablas** y ejecuta las migraciones desde cero. Úsalo solo en desarrollo local cuando necesites resetear la BD completamente.

Si además quieres poblar datos de prueba:

```bash
./vendor/bin/sail artisan migrate:fresh --seed
```

### 6. Rollback (revertir migraciones)

Para deshacer la última migración (o batch de migraciones):

```bash
./vendor/bin/sail artisan migrate:rollback
./vendor/bin/sail artisan migrate
```

> 💡 **Tip:** En producción, evita usar `rollback` y `fresh`. En su lugar, crea nuevas migraciones que modifiquen el esquema de forma segura (añadir columnas, índices, etc.).
