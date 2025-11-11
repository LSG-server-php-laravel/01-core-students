# Ejercicio: Setup inicial de Laravel + Rutas básicas

Utiliza Laravel Sail y las herramientas vistas en la sesión para realizar este ejercicio.

## Objetivo

Preparar el entorno de desarrollo de una API REST con Laravel Sail, configurar la base de datos y crear dos rutas simples de prueba.

## Requisitos

- Crear un proyecto Laravel funcional llamado **bookhaven-api**
- Configurar Docker con Laravel Sail
- Conectar Laravel a una base de datos MySQL
- Crear dos rutas API de diagnóstico:
  - `/api/health` - información del sistema
  - `/api/info` - información de la librería

## Pasos a seguir

1. Crear el proyecto Laravel
2. Instalar Laravel Sail
3. Añadir phpMyAdmin (opcional pero recomendado)
4. Levantar los contenedores.
   Verifica que todo esté funcionando:

   - Laravel: `http://localhost`
   - phpMyAdmin: `http://localhost:8080`

5. Crear las rutas API.
   Abre el archivo `routes/api.php` y añade las siguientes rutas:

   **Ruta `/api/health`:**

   ```php
   Route::get('/health' ...);
   ```

   Esta ruta devuelve información del sistema y sirve para verificar que la aplicación está funcionando correctamente. Rellenala como en la demostración.

   **Ruta `/api/info`:**

   ```php
   Route::get('/info', function () {
       return response()->json([
           'store_name' => 'BookHaven',
           'books_in_stock' => 125,
           'genres' => ['ficción', 'ensayo', 'infantil', 'misterio'],
       ]);
   });
   ```

   Esta ruta devuelve información básica de la librería.

6. Probar las rutas.
   Abre tu navegador o Postman y prueba las siguientes URLs:

   - `http://localhost/api/health`
   - `http://localhost/api/info`

## Problemas comunes y soluciones

### Error: "SQLSTATE\[HY000\] \[2002\] Connection refused"

**Causa:** Laravel intenta conectarse a MySQL antes de que el contenedor esté listo.

**Solución:** Espera unos segundos y vuelve a intentarlo, o reinicia los contenedores:

```bash
./vendor/bin/sail down
./vendor/bin/sail up -d
```

### Error: "Base de datos no encontrada"

**Causa:** La base de datos definida en el `.env` no existe.

**Solución:** Créala desde phpMyAdmin o ejecuta:

```bash
./vendor/bin/sail mysql -e "CREATE DATABASE bookhaven;"
```

### Error: "Puerto 80 ya está en uso"

**Causa:** Otro servicio está usando el puerto 80.

**Solución:** Cambia el puerto en `docker-compose.yml`:

```yaml
ports:
  - '8000:80'
```

Luego accede a `http://localhost:8000`
