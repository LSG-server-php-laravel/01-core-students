# 📝 Ejercicio Modelos

## 📚 BookHaven API — Modelos y Relaciones

En la sesión anterior definiste las migraciones de la base de datos para BookHaven (tablas `books`, `reviews` y `categories`).  
En esta actividad, trabajarás la capa de **modelos Eloquent** y las **relaciones básicas** entre ellos.

---

## 🎯 Objetivo general

Crear los modelos principales de BookHaven y definir relaciones sencillas de tipo `hasMany`, `belongsTo` y `belongsToMany` entre:

- Usuarios y libros.
- Libros y reseñas.
- Usuarios y reseñas.
- Libros y categorías (relación muchos a muchos mediante tabla pivote).

No se trabajarán todavía:

- Controladores.
- Rutas.

---

## 📐 Parte 1 — Modelo Book

Crea un modelo que represente la tabla de libros.

Debe cumplir:

- Representar a la tabla `books`.
- Permitir asignar masivamente los campos básicos del libro:
  - título, autor, género, páginas, estado, resumen.
  - las claves que indiquen quién creó el libro y quién lo está leyendo.
- Definir las siguientes relaciones:
  - Una relación que indique que un libro pertenece a un usuario creador.
  - Una relación opcional que indique que un libro pertenece a un usuario que lo está leyendo actualmente.
  - Una relación que indique que un libro puede tener muchas reseñas.

---

## 📐 Parte 2 — Modelo Review

Crea un modelo que represente las reseñas de los libros.

Debe cumplir:

- Representar a la tabla `reviews`.
- Permitir asignar masivamente:
  - el contenido de la reseña,
  - la puntuación,
  - las claves externas que lo relacionan con un libro y con un usuario.
- Definir las relaciones:
  - Una reseña pertenece a un libro.
  - Una reseña pertenece a un usuario autor de la reseña.

---

## 📐 Parte 3 — Modelo Category

Crea un modelo que represente las categorías de libros.

Debe cumplir:

- Representar a la tabla `categories`.
- Permitir asignar masivamente:
  - el nombre de la categoría,
  - la descripción opcional.
- Definir una relación muchos a muchos con libros usando una tabla pivote `book_category` (convención Laravel):
  - La tabla pivote debe tener: `book_id`, `category_id`, timestamps.
  - En el modelo `Book`: `belongsToMany(Category::class)`.
  - En el modelo `Category`: `belongsToMany(Book::class)`.

Comando sugerido para crear la migración de la tabla pivote:

```bash
./vendor/bin/sail artisan make:migration create_book_category_table
```

---

## 📐 Parte 4 — Relación en el modelo User

En el modelo de usuario de la aplicación, añade relaciones que permitan:

- Obtener todos los libros creados por ese usuario.
- Obtener todos los libros que el usuario está leyendo actualmente.
- Obtener todas las reseñas que ha escrito el usuario.

Estas relaciones deben estar basadas en los campos de claves externas definidos en las tablas correspondientes.

---

## ▶️ Validación del ejercicio

Para dar el ejercicio por completado, deberás poder explicar o mostrar:

- El diseño de cada uno de los modelos (`Book`, `Review`, `Category`).
- Qué relaciones se han definido en cada modelo y qué significan en el dominio:
  - Un usuario tiene muchos libros creados.
  - Un libro tiene muchas reseñas.
  - Una reseña pertenece a un usuario y a un libro.
- Que la lectura de estas relaciones se entiende en ambos sentidos:
  - Desde el punto de vista del usuario.
  - Desde el punto de vista del libro.
  - Desde el punto de vista de la reseña.

---
