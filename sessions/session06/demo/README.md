# Laravel Environment Configuration

## Instalación de Laravel

Documentación oficial: <https://laravel.com/docs/12.x/installation>

Comando alternativo a `laravel new my-project`:

```bash
composer create-project laravel/laravel my-project
```

Para ejecutar Laravel en local se puede usar `php artisan serve`, sin embargo, utilizaremos un enfoque más profesional mediante contenedores Docker con el paquete **Laravel Sail**, que proporciona un entorno de desarrollo completo y consistente.

## Laravel Sail

Documentación oficial: <https://laravel.com/docs/12.x/sail>

### Instalación de Sail

```bash
php artisan sail:install
```

### Selección de servicios

Al ejecutar el comando anterior, se te preguntará qué servicios deseas instalar:

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

```text
> 0,3,7,8
```

Esto instalará: MySQL, Redis, Mailpit y Selenium.

## Añadir phpMyAdmin a Docker Sail

Para agregar phpMyAdmin al archivo `docker-compose.yml` de Sail, añade el siguiente servicio:

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

Una vez configurado, podrás acceder a phpMyAdmin en `http://localhost:8080`.

## Configuración de PHP CS Fixer

Será necesario configurar de nuevo el PHPCS. Además, se debe configurar el PHPCSFixer. Para instalar el PHPFixer y validar la sintaxis del código, instálalo globalmente:

```bash
composer global require friendsofphp/php-cs-fixer
```
