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
./vendor/bin/sail artisan make:migration create_pets_table --create=pets
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

### 5. Rollback (si hace falta)

```bash
./vendor/bin/sail artisan migrate:rollback
./vendor/bin/sail artisan migrate
```
