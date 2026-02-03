# PetRescue API — Demo (Factories)

## 🎯 Objetivo

Introducir el uso de **Factories** en Laravel para generar **datos de forma automática y masiva**, partiendo de los seeders manuales creados en la sesión anterior.

El objetivo es aprender a:

- Definir factories para modelos.
- Generar datos realistas usando Faker.
- Usar **states** para representar distintos escenarios del dominio.
- Combinar factories con seeders.

---

## 🧠 Idea clave de la demo

En esta sesión pasamos de:

- **Datos manuales e intencionales**
  a
- **Datos automáticos y escalables**.

Las factories permiten:

- generar muchos registros rápidamente,
- sin perder control sobre los casos importantes del dominio.

---

## 📂 Archivos implicados

### Factories

- `database/factories/UserFactory.php`

  - Genera usuarios aleatorios.
  - Se usará tanto directamente como desde otras factories.

- `database/factories/PetFactory.php`
  - Genera mascotas con datos realistas.
  - Define **states** para representar distintos estados:
    - `available`
    - `pending`
    - `adopted`

---

### Seeders

- `database/seeders/UserSeeder.php`

  - Crea usuarios conocidos (emails fijos).
  - Genera usuarios adicionales usando `UserFactory`.

- `database/seeders/PetSeeder.php`

  - Crea mascotas “de escenario”.
  - Genera volumen de mascotas usando factories y states.

- `database/seeders/DatabaseSeeder.php`
  - Orquesta la ejecución de los seeders.

---

## 🛠 Comandos utilizados (Sail)

### Crear Factories

```bash
php artisan make:factory UserFactory
php artisan make:factory PetFactory
```

---

## 🧪 Qué datos se generan

### Usuarios

- Usuarios fijos para la demo:
  - Permiten login y pruebas de autorización.
- Usuarios aleatorios:
  - Aportan volumen y realismo.

---

### Mascotas

- Mascotas creadas manualmente desde factories:
  - Casos clave para explicar policies y reglas.
- Mascotas generadas en masa:
  - Listados largos.
  - Pruebas más cercanas a un entorno real.

Los estados (`available`, `pending`, `adopted`) se controlan mediante **states de la factory**, no con lógica externa.
