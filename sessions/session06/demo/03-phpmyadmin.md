# 3. Añadir phpMyAdmin a Docker Sail

phpMyAdmin es una herramienta web que te permite gestionar tu base de datos MySQL de forma visual, sin necesidad de usar comandos SQL directamente.

## Configuración

Para agregar phpMyAdmin a tu proyecto Laravel Sail, necesitas editar el archivo `docker-compose.yml` que se encuentra en la raíz de tu proyecto.

### Paso 1: Editar docker-compose.yml

Abre el archivo `docker-compose.yml` y añade el siguiente servicio después de la configuración de `mysql`:

```yaml
phpmyadmin:
  image: 'phpmyadmin:latest'
  ports:
    - '${FORWARD_PHPMYADMIN_PORT:-8080}:80'
  environment:
    PMA_HOST: mysql
    PMA_PORT: 3306
    PMA_USER: '${DB_USERNAME}'
    PMA_PASSWORD: '${DB_PASSWORD}'
    MYSQL_ROOT_PASSWORD: '${DB_PASSWORD}'
  networks:
    - sail
  depends_on:
    - mysql
```

### Paso 2: Reiniciar los contenedores

Para que los cambios surtan efecto, reinicia los contenedores de Sail:

```bash
# Detener los contenedores actuales
./vendor/bin/sail down

# Volver a iniciarlos
./vendor/bin/sail up -d
```

### Paso 3: Acceder a phpMyAdmin

Una vez que los contenedores estén corriendo, abre tu navegador y accede a:

```text
http://localhost:8080
```

**Credenciales de acceso:**

- **Servidor:** `mysql`
- **Usuario:** `sail` (o el valor de `DB_USERNAME` en tu `.env`)
- **Contraseña:** `password` (o el valor de `DB_PASSWORD` en tu `.env`)

## Usar phpMyAdmin

Una vez dentro de phpMyAdmin, podrás:

- 📊 Visualizar las tablas de tu base de datos
- ✏️ Crear, editar y eliminar registros
- 🔍 Ejecutar consultas SQL personalizadas
- 📋 Importar y exportar bases de datos
- 🗂️ Gestionar la estructura de las tablas

## Cambiar el puerto (opcional)

Si el puerto 8080 ya está en uso, puedes cambiarlo editando tu archivo `.env`:

```env
FORWARD_PHPMYADMIN_PORT=8081
```

Después de cambiar el puerto, reinicia los contenedores:

```bash
./vendor/bin/sail down
./vendor/bin/sail up -d
```

Ahora podrás acceder a phpMyAdmin en `http://localhost:8081`

## Problemas comunes

### No puedo acceder a phpMyAdmin

1. Verifica que los contenedores estén corriendo:

   ```bash
   ./vendor/bin/sail ps
   ```

2. Asegúrate de que el servicio `phpmyadmin` aparece en la lista

3. Verifica que el puerto no esté ocupado por otra aplicación

### Error de conexión con MySQL

1. Verifica las credenciales en tu archivo `.env`
2. Asegúrate de que el contenedor de MySQL esté corriendo
3. Usa `mysql` como nombre del servidor (no `localhost` ni `127.0.0.1`)

---

**Siguiente paso:** [Configurar PHP CS Fixer →](./04-phpcs.md)

**Paso anterior:** [← Configuración Windows](./02-setup-windows.md)

**Volver al índice:** [README](./README.md)
