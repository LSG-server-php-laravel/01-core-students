# 2. Configuración en Windows (WSL2 + Git Bash)

## Errores comunes en Windows

### Error: "The system cannot find the path specified"

**Problema:** Al ejecutar `php artisan sail:install` en Windows, aparece el error `The system cannot find the path specified`.

**Causa:** Laravel Sail requiere WSL2 (Windows Subsystem for Linux) para funcionar correctamente en Windows, ya que Docker necesita un entorno Linux.

**Solución:**

#### Paso 1: Instalar WSL2 con Ubuntu

1. Abre **PowerShell como administrador** (clic derecho → "Ejecutar como administrador")

2. Ejecuta el siguiente comando:

   ```powershell
   wsl --install -d Ubuntu
   ```

3. **Reinicia tu ordenador** (es necesario para que WSL2 se active)

4. Después del reinicio, abre la aplicación **Ubuntu** desde el menú inicio
   - La primera vez te pedirá crear un usuario y contraseña de Linux
   - Completa la configuración inicial

#### Paso 2: Instalar y configurar Docker Desktop

1. Descarga e instala [Docker Desktop para Windows](https://www.docker.com/products/docker-desktop/)

2. Abre Docker Desktop y ve a **Settings** (⚙️)

3. En la sección **General**, asegúrate de que la opción **"Use the WSL 2 based engine"** esté activada

4. En la sección **Resources → WSL Integration**:

   - Activa **"Enable integration with my default WSL distro"**
   - Activa **Ubuntu** en la lista de distribuciones

5. Aplica los cambios y reinicia Docker Desktop

#### Paso 3: Ejecutar Sail desde Git Bash

1. Abre **Git Bash** en la carpeta de tu proyecto (clic derecho → "Git Bash Here")

2. Asegúrate de que **Docker Desktop esté corriendo** (icono de Docker en la bandeja del sistema)

3. Ejecuta Sail:

   ```bash
   vendor/bin/sail up -d
   ```

   > **Nota:** En Git Bash **no** uses `./` al inicio del comando. Usa `vendor/bin/sail` directamente.

   Si tienes problemas, prueba con:

   ```bash
   bash vendor/bin/sail up -d
   ```

#### Verificar que todo funciona

```bash
# Ver que los contenedores están corriendo
vendor/bin/sail ps

# Acceder a la aplicación
# Abre tu navegador en: http://localhost
```

> **Recomendaciones:**
>
> - **Alias:** Para no escribir `vendor/bin/sail` cada vez, añade este alias a tu archivo `~/.bashrc` (en tu carpeta home de Windows):
>
>   ```bash
>   alias sail='bash vendor/bin/sail'
>   ```
>
>   Después de guardarlo, reinicia Git Bash y ya podrás usar simplemente `sail up -d`
>
> - **VS Code:** Puedes trabajar normalmente abriendo la carpeta del proyecto desde Windows. No necesitas configuraciones especiales.

### Error: "Docker is not running"

**Problema:** Al intentar ejecutar `vendor/bin/sail up`, aparece el error `Docker is not running` o `Cannot connect to the Docker daemon`.

**Causa:** Docker Desktop no está iniciado o no está configurado correctamente para trabajar con WSL2.

**Solución:**

1. **Inicia Docker Desktop** manualmente desde el menú inicio de Windows

   - Espera a que el icono de Docker en la bandeja del sistema deje de parpadear
   - Debería mostrar "Docker Desktop is running"

2. Si Docker Desktop está corriendo pero sigue el error, verifica la configuración:

   - Abre Docker Desktop y ve a **Settings** (⚙️)
   - En la sección **General**, asegúrate de que **"Use the WSL 2 based engine"** esté activada:

     ![Docker Desktop - General](./assets/screenshot-docker-1.png)

   - En la sección **Resources → WSL Integration**:

     - Activa **"Enable integration with my default WSL distro"**
     - Activa **Ubuntu** en la lista de distribuciones disponibles

     ![Docker Desktop - WSL Integration](./assets/screenshot-docker-2.png)

   - Aplica los cambios y reinicia Docker Desktop

3. Vuelve a intentar ejecutar Sail desde Git Bash:

   ```bash
   vendor/bin/sail up -d
   ```

> **Consejo:** Configura Docker Desktop para que se inicie automáticamente con Windows:
> Settings → General → "Start Docker Desktop when you log in"

## Resumen de comandos para Windows

```bash
# Instalar WSL2
wsl --install -d Ubuntu

# Ejecutar Sail desde Git Bash
vendor/bin/sail up -d

# Ver estado
vendor/bin/sail ps

# Detener
vendor/bin/sail down
```

---

**Siguiente paso:** [Añadir phpMyAdmin →](./03-phpmyadmin.md)

**Paso anterior:** [← Instalación](./01-installation.md)

**Volver al índice:** [README](./README.md)
