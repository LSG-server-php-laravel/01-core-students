# 📝 Ejercicio Seeders

## 📚 BookHaven API — Seeders manuales (sin Factories)

En las sesiones anteriores has construido la API de **BookHaven** con:

- Migraciones y modelos (`Book`, `Review`, `Category`).
- Relaciones entre entidades.
- Autenticación con Sanctum.
- Autorización usando Form Requests y Policies.

En esta actividad vas a poblar la base de datos usando **Seeders manuales**, sin usar todavía **Factories** ni datos aleatorios.

---

## 🎯 Objetivo general

Al finalizar el ejercicio, tu proyecto BookHaven deberá:

- Tener datos iniciales claros y controlados en la base de datos.
- Permitir probar la API sin tener que crear registros manualmente.
- Disponer de escenarios concretos para:
  - probar autorización,
  - probar estados de los libros,
  - preparar el terreno para la siguiente sesión de Factories.

---

## 🧠 Idea clave del ejercicio

En este ejercicio:

- Los datos **no son aleatorios**.
- Cada registro debe tener un **sentido funcional**.
- Los seeders se usan para crear **escenarios**, no volumen.

---

## 📐 Parte 1 — Seeder de usuarios

Crea un seeder para usuarios que inserte varios usuarios fijos en la base de datos.

### Requisitos

El seeder debe crear al menos:

- Un usuario que actúe como creador de libros.
- Uno o dos usuarios adicionales para:
  - probar autenticación,
  - probar autorización entre distintos usuarios.

Los datos deben ser claros y reconocibles (emails y nombres identificables).

---

## 📐 Parte 2 — Seeder de libros

Crea un seeder para libros que inserte varios libros con combinaciones distintas de estado y creador.

### Requisitos

Los libros creados deben cubrir, como mínimo, estos casos:

- Un libro en estado editable (por ejemplo, `draft` o `reading`).
- Un libro en estado no editable (por ejemplo, `finished`).
- Libros creados por distintos usuarios.

Cada libro debe estar asociado a un usuario creador.

---

## 📐 Parte 3 — Relación con reseñas (opcional pero recomendado)

De forma opcional, puedes añadir reseñas manuales asociadas a algunos libros.

### Requisitos

- Las reseñas deben:
  - pertenecer a un libro concreto,
  - pertenecer a un usuario concreto.
- No es necesario cubrir todos los libros.
- El objetivo es disponer de datos para probar relaciones.

---

## 📐 Parte 4 — Ejecución de seeders

Configura el `DatabaseSeeder` para que ejecute todos los seeders creados.

El resultado debe permitir:

- Resetear la base de datos.
- Volver a poblarla con los mismos datos controlados.

---

## 🧪 Qué debe permitir probar tu base de datos

Con los datos generados, debe ser posible:

- Listar libros y ver distintos estados.
- Probar acciones permitidas y bloqueadas según el estado del libro.
- Probar autorización:
  - un usuario editando su propio libro,
  - un usuario intentando editar un libro de otro.
