# 1. Instalación de Laravel y Sail

## Instalación de Laravel

Documentación oficial: <https://laravel.com/docs/12.x/installation>

Comando alternativo a `laravel new my-project`:

```bash
composer create-project laravel/laravel my-project
cd my-project
```

Para ejecutar Laravel en local se puede usar `php artisan serve`, sin embargo, utilizaremos un enfoque más profesional mediante contenedores Docker con el paquete **Laravel Sail**, que proporciona un entorno de desarrollo completo y consistente.

## Laravel Sail

Documentación oficial: <https://laravel.com/docs/12.x/sail>

### Instalación de Sail

```bash
composer require laravel/sail --dev
php artisan sail:install --with=mysql,redis,mailpit,selenium
```

### Selección de servicios

Si ejecutas la instalación sin el flag `--with` te preguntará qué servicios deseas instalar:

```text
Which services would you like to install? [mysql]:
[0] mysql
[1] pgsql
[2] mariadb
[3] redis
[4] memcached
[5] meilisearch
[6] minio
[7] mailpit
[8] selenium
```

Selecciona los servicios que necesites, para estas demostraciones usaremos:

**MySQL, Redis, Mailpit y Selenium** (pon los números separados por comas: `0,3,7,8`)

### Ejecución de Sail

Una vez instalado Sail, puedes iniciar todos los contenedores de Docker con un único comando:

```bash
./vendor/bin/sail up
```

**Opciones de ejecución:**

- **Modo interactivo (foreground):** `./vendor/bin/sail up`

  - Mantiene la terminal activa mostrando los logs en tiempo real
  - Útil para desarrollo y debugging
  - Detener: `Ctrl + C`

- **Modo detached (background):** `./vendor/bin/sail up -d`
  - Ejecuta los contenedores en segundo plano
  - Libera la terminal para otros comandos
  - Ver logs: `./vendor/bin/sail logs`
  - Detener: `./vendor/bin/sail down`

### Comandos útiles de Sail

```bash
# Detener todos los contenedores
./vendor/bin/sail down

# Ver logs en tiempo real
./vendor/bin/sail logs -f

# Reiniciar los contenedores
./vendor/bin/sail restart

# Ver el estado de los contenedores
./vendor/bin/sail ps

# Ejecutar comandos artisan
./vendor/bin/sail artisan migrate

# Ejecutar composer
./vendor/bin/sail composer install

# Ejecutar npm
./vendor/bin/sail npm install
```

### Crear un alias (opcional pero recomendado)

Para no tener que escribir `./vendor/bin/sail` cada vez, puedes crear un alias:

**En macOS/Linux:**

```bash
alias sail='./vendor/bin/sail'
```

Añádelo a tu archivo `~/.zshrc` o `~/.bashrc` para que persista entre sesiones.

**En Windows con Git Bash:**

```bash
alias sail='bash vendor/bin/sail'
```

Añádelo a tu archivo `~/.bashrc` en tu carpeta home de Windows.

Después de crear el alias, puedes usar simplemente:

```bash
sail up -d
sail artisan migrate
sail composer install
```

## Verificar la instalación

Una vez que los contenedores estén corriendo:

1. Abre tu navegador en `http://localhost`
2. Deberías ver la página de bienvenida de Laravel
3. Verifica que todos los servicios están activos:

```bash
./vendor/bin/sail ps
```

---

**Siguiente paso:** [Configuración en Windows →](./02-setup-windows.md)

**Volver al índice:** [README](./README.md)
