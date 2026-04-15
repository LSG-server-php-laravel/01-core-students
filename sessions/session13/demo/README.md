# PetRescue API — Demo (Seeders)

## 🎯 Objetivo

Introducir el uso de **Seeders** para poblar la base de datos con **datos controlados y significativos**.

El objetivo es disponer de datos reales y comprensibles para:

- Probar la API.
- Demostrar validaciones, autorización y policies.
- Tener escenarios claros para la siguiente sesión.

---

## 🧠 Idea clave de la demo

En esta sesión:

- Los datos **no son aleatorios**.
- Cada registro existe por un **motivo pedagógico**.
- Los seeders se usan para crear **escenarios concretos**, no volumen.

---

## 📂 Archivos implicados

### Seeders

- `database/seeders/UserSeeder.php`

  - Crea varios usuarios fijos.
  - Permite probar autenticación y autorización entre usuarios distintos.

- `database/seeders/PetSeeder.php`

  - Crea mascotas con distintos estados:
    - disponibles,
    - adoptadas,
    - pendientes.
  - Asocia mascotas a distintos creadores y adoptantes.

- `database/seeders/DatabaseSeeder.php`
  - Ejecuta los seeders de usuarios y mascotas.

---

## 🛠 Comandos utilizados (Sail)

### Crear seeders

```bash
./vendor/bin/sail artisan make:seeder UserSeeder
./vendor/bin/sail artisan make:seeder PetSeeder
```

### Ejecutar seeders

```bash
./vendor/bin/sail artisan db:seed
```

### Resetear y poblar todo (entorno de desarrollo)

```bash
./vendor/bin/sail artisan migrate:fresh --seed
```

---

## 🧪 Qué datos se generan

### Usuarios

- Un usuario “admin”.
- Dos usuarios normales.

Estos usuarios permiten:

- probar login,
- generar tokens distintos,
- verificar policies entre creadores.

### Mascotas

Se generan mascotas con combinaciones como:

- Mascotas no adoptadas → editables según policy.
- Mascotas adoptadas → bloqueadas por Form Request.
- Mascotas creadas por distintos usuarios.

Esto permite demostrar:

- diferencias entre 401 y 403,
- reglas de contexto,
- reglas por recurso.
