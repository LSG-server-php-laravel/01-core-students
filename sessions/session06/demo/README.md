# Laravel Environment Configuration

Esta sesión cubre la instalación y configuración de Laravel usando Docker con Laravel Sail, una herramienta que proporciona un entorno de desarrollo completo y consistente.

## 📚 Contenido de la sesión

### 1. [Instalación de Laravel y Sail](./01-installation.md)

- Crear un proyecto Laravel
- Instalar Laravel Sail
- Seleccionar servicios (MySQL, Redis, Mailpit, Selenium)
- Ejecutar y gestionar contenedores Docker
- Comandos útiles de Sail

### 2. [Configuración en Windows (WSL2 + Git Bash)](./02-setup-windows.md)

- Instalar WSL2 con Ubuntu
- Configurar Docker Desktop
- Trabajar con Sail desde Git Bash
- Solución de errores comunes

### 3. [Añadir phpMyAdmin](./03-phpmyadmin.md)

- Configuración de phpMyAdmin en docker-compose.yml
- Acceso y uso de phpMyAdmin

### 4. [Configurar PHP CS Fixer](./04-phpcs.md)

- Instalación de PHP CS Fixer
- Configuración en el proyecto

## 🎯 Objetivos

Al finalizar esta sesión, serás capaz de:

- ✅ Crear y configurar un proyecto Laravel con Sail
- ✅ Trabajar con contenedores Docker para desarrollo
- ✅ Resolver problemas comunes en Windows
- ✅ Usar phpMyAdmin para gestionar la base de datos
- ✅ Mantener un código limpio con PHP CS Fixer

## 🚀 Inicio rápido

Si ya tienes todo configurado y solo quieres recordar los comandos básicos:

```bash
# Crear proyecto
composer create-project laravel/laravel mi-proyecto
cd mi-proyecto

# Instalar Sail
composer require laravel/sail --dev
php artisan sail:install --with=mysql,redis,mailpit,selenium

# Iniciar contenedores
vendor/bin/sail up -d

# Ver estado
vendor/bin/sail ps

# Acceder a la aplicación
# http://localhost
```

## 📖 Documentación oficial

- [Laravel Documentation](https://laravel.com/docs/12.x)
- [Laravel Sail](https://laravel.com/docs/12.x/sail)
- [Docker Desktop](https://www.docker.com/products/docker-desktop/)

---

**💡 Tip:** Empieza por el [documento de instalación](./01-installation.md) si es tu primera vez con Laravel Sail.
