# 📝 Ejercicio Migraciones

## 📚 BookHaven API — Migraciones iniciales

Tu tarea consiste en diseñar la estructura inicial de la base de datos para **BookHaven API**, una futura plataforma donde los usuarios podrán gestionar libros, lecturas, reseñas y categorías.

El objetivo es practicar el diseño de tablas y relaciones mediante migraciones, aplicando únicamente los conceptos explicados en la sesión.

---

## 🎯 Objetivo general

Crear la base de datos inicial de BookHaven con tres tablas:

1. `books` — Tabla principal del sistema.
2. `reviews` — Reseñas escritas por usuarios.
3. `categories` — Categorías de libros.

Todas las tablas deben incluir:

- Campos relevantes del dominio.
- Gestión de claves foráneas con campos opcionales.
- Ausencia de índices manuales.
- Estructura limpia y preparada para futuras sesiones.

---

## 📐 Requisitos del ejercicio

### 1️⃣ Tabla `books`

La tabla debe incluir los siguientes campos principales del libro:

- Un campo para el título del libro.
- Un campo para el nombre del autor del libro.
- Un campo para el género literario.
- Un campo numérico para el número total de páginas.
- Un campo de tipo enumeración con los valores: “available”, “reading” y “finished”.
- Un campo opcional para un resumen o descripción del libro.

Además, debe incluir dos relaciones con la tabla de usuarios:

- Un campo para identificar quién ha añadido el libro al sistema.
- Un campo para identificar quién está leyendo actualmente el libro.

Ambos campos deben ser opcionales y anularse automáticamente si el usuario asociado es eliminado.

---

### 2️⃣ Tabla `reviews`

Representa las reseñas que los usuarios escriben sobre un libro.

Debe incluir:

- Un campo para el contenido de la reseña.
- Un campo numérico para la puntuación, con valores razonables (por ejemplo, del 1 al 5).
- Una relación con un libro.
- Una relación con un usuario (autor de la reseña).

Condiciones de las relaciones:

- Ambas deben ser opcionales.
- Deben estar vinculadas con las tablas correspondientes.
- Si el libro o el usuario relacionado se elimina, el campo debe quedar vacío automáticamente.

---

### 3️⃣ Tabla `categories`

Representa las categorías literarias disponibles en el sistema.

Debe incluir:

- Un campo para el nombre de la categoría.
- Un campo opcional para una descripción de la categoría.

En esta sesión **no** debes relacionar las categorías con los libros ni crear tablas pivote.
Es suficiente con dejar la tabla creada y lista para futuras ampliaciones.
