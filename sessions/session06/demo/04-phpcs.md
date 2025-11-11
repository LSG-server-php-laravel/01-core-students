# 4. Configurar PHP CS Fixer

PHP CS Fixer es una herramienta que te ayuda a mantener un código limpio y consistente, aplicando automáticamente las convenciones de estilo de código de PHP y Laravel.

## Instalación

Para instalar PHP CS Fixer globalmente en tu sistema:

```bash
composer global require friendsofphp/php-cs-fixer
```

## Verificar la instalación

Comprueba que PHP CS Fixer se instaló correctamente:

```bash
php-cs-fixer --version
```

Deberías ver algo como:

```text
PHP CS Fixer 3.x.x
```

## Uso básico

### Analizar archivos sin modificarlos

Para ver qué cambios sugiere PHP CS Fixer sin aplicarlos:

```bash
php-cs-fixer fix ruta/al/archivo.php --dry-run --diff
```

### Aplicar correcciones

Para aplicar las correcciones automáticamente:

```bash
php-cs-fixer fix ruta/al/archivo.php
```

### Analizar todo el proyecto

Para analizar y corregir todos los archivos PHP del proyecto:

## Integración con VS Code

Para que VS Code use PHP CS Fixer automáticamente:

1. Instala la extensión **PHP CS Fixer** de junstyle

2. Añade esta configuración a tu `settings.json` de VS Code:

```json
{
  "php-cs-fixer.executablePath": "php-cs-fixer",
  "php-cs-fixer.onsave": true,
  "php-cs-fixer.rules": "@PSR12",
  "[php]": {
    "editor.formatOnSave": true,
    "editor.defaultFormatter": "junstyle.php-cs-fixer"
  }
}
```

Ahora, cada vez que guardes un archivo PHP, se aplicarán las correcciones automáticamente.

## Referencias

- [Documentación oficial de PHP CS Fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer)
- [Lista completa de reglas](https://mlocati.github.io/php-cs-fixer-configurator/)

---

**Paso anterior:** [← phpMyAdmin](./03-phpmyadmin.md)

**Volver al índice:** [README](./README.md)
