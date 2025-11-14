````markdown
# 🛠️ Walkthrough — Configuración Laravel con Sail (Sesión 06)

Breve guion con los pasos prácticos de la sesión y pequeñas explicaciones para cada uno. Está pensado para usar en clase: cada bloque indica qué haremos, por qué y puntos de atención.

## Objetivo rápido

- Poner en marcha un proyecto Laravel con Laravel Sail (MySQL) y herramientas auxiliares (phpMyAdmin, PHP CS Fixer).
- Entender los comandos básicos de Sail y cómo resolver problemas comunes en Windows (Git Bash / WSL).

## Que entregamos

- Entradas: repositorio vacío o plantilla, Docker Desktop instalado, Composer, Git.
- Salida: proyecto Laravel arrancado dentro de Sail, acceso a la BD (phpMyAdmin), y configuración básica de PHP CS Fixer.
- Errores esperados: problemas de permisos en Windows, contenedores no arrancan por Docker Desktop mal configurado, variables de entorno incorrectas.

---

## 1) Crear el proyecto y preparar Sail (10 min)

- Qué hacer: crear un proyecto nuevo con Composer y añadir Laravel Sail como dependencia de desarrollo.
- Comando esencial (recordatorio):

```bash
composer create-project laravel/laravel mi-proyecto
cd mi-proyecto
composer require laravel/sail --dev
php artisan sail:install --with=mysql,redis,mailpit,selenium
```

- Por qué: Sail proporciona contenedores reproducibles con MySQL y servicios auxiliares. Elegimos MySQL por compatibilidad con ejercicios y phpMyAdmin.
- Atención: al ejecutar `sail:install` te preguntará qué servicios incluir; seleccionad MySQL si queréis usar phpMyAdmin tal como está documentado.

## 2) Iniciar contenedores y verificar (5 min)

- Qué hacer: arrancar los contenedores y comprobar el estado.

```bash
vendor/bin/sail up -d
vendor/bin/sail ps
```

- Por qué: `up -d` levanta los contenedores en segundo plano; `ps` permite comprobar que el servicio MySQL está healthy.
- Troubleshooting rápido: si la app no responde, revisad `vendor/bin/sail logs` o `docker desktop` para ver errores de arranque; comprobad `DB_*` en `.env`.

## 3) Añadir y acceder a phpMyAdmin (5 min)

- Qué hacer: añadir la sección de `phpmyadmin` al `docker-compose.yml` (ver `03-phpmyadmin.md`) y exponer el puerto apropiado.
- Por qué: phpMyAdmin facilita la inspección de tablas y datos durante la clase y para los ejercicios.
- Acceso típico: http://localhost:8080 (o el puerto elegido) con las credenciales de la BD (usuario/root según `.env`).

Consejo: no dejéis phpMyAdmin accesible en producción. Para clase está bien en local.

## 4) Migraciones: crear la tabla de ejemplo (10 min)

- Qué haremos: crear y explicar una migración (estructura de tabla, foreign keys, índices, timestamps).

```bash
./vendor/bin/sail artisan make:migration create_pets_table --create=pets
```

- Explicación breve:
  - `up()` aplica la estructura a la BD; `down()` la revierte.
  - Usad `nullable()` en foreign keys si una relación puede faltar y `nullOnDelete()` para evitar borrados en cascada inesperados.
  - Considerad índices para campos de búsqueda y siempre añadid `$table->timestamps()` si queréis `created_at`/`updated_at`.

## 5) Ejecutar migraciones y comprobar estado (5–7 min)

- Comandos:

```bash
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan migrate:status
```

- Por qué: aplicar migraciones y confirmar qué migraciones se han ejecutado. Si hay errores, revisar `.env` (credenciales DB), logs y que el contenedor MySQL esté listo.

## 6) Rollback y edición rápida de migraciones (5 min)

- Comandos útiles:

```bash
./vendor/bin/sail artisan migrate:rollback
./vendor/bin/sail artisan migrate --step=1
```

- Notas: `migrate:rollback` revierte la última batch; `--step=N` revierte N migraciones. Evitar en producción salvo que sepáis el impacto.

## 7) Configurar PHP CS Fixer (5 min)

- Qué: instalar PHP CS Fixer y añadir un archivo de configuración para estandarizar estilo.
- Por qué: mantener un estilo de código homogéneo en el proyecto y evitar discusiones en clase.
- Referencia: ver `04-phpcs.md` para comandos y configuración sugerida.

## 8) Windows (Git Bash / WSL) — consejos rápidos

- Recomendación: para esta sesión documentamos ambos caminos; si usáis Git Bash en Windows recordad ejecutar Sail mediante `vendor/bin/sail` y tener Docker Desktop con WSL2 backend configurado.
- Problemas frecuentes: paths montados incorrectos (revisad `/etc/wsl.conf` en WSL), permisos de archivos y diferencias CRLF. Si hay problemas con Docker, reiniciad Docker Desktop.

## 9) Entregables para el alumnado

- Tener el proyecto arrancado con `vendor/bin/sail up -d`.
- Migraciones ejecutadas y tabla de ejemplo creada.
- Acceso a phpMyAdmin para comprobar datos.
- PHP CS Fixer configurado y un `composer fix` que pase localmente.

## 10) Troubleshooting & preguntas frecuentes

- Si `artisan migrate` falla: comprobad `DB_CONNECTION`, `DB_HOST` (usualmente `mysql` en Sail), `DB_PORT`, y que el contenedor MySQL esté healthy.
- Si los contenedores no arrancan: mirar `vendor/bin/sail logs` y Docker Desktop; a veces faltan recursos (aumentar memoria/CPU en Docker Desktop).

---

Si queréis que añada un ejemplo mínimo de migración Eloquent (esqueleto `create_pets_table`) como anexo, lo incluyo en este fichero como bloque opcional.
````
