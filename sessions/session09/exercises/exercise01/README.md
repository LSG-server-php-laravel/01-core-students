# 📝 Ejercicio Rutas y Controladores

## 📚 BookHaven API — Controladores y Rutas REST

En la sesión anterior creaste los modelos y relaciones principales de **BookHaven** (`Book`, `Review`, `Category`) y añadiste las relaciones necesarias con el modelo de usuario.

En esta actividad vas a construir la capa de **controladores** y **rutas API** para exponer un conjunto de endpoints REST, centrándote en:

- Un CRUD completo de libros.
- La creación y eliminación de reseñas de un libro concreto.
- La gestión básica de categorías y su relación con los libros.

---

## 🎯 Objetivo general

Al finalizar el ejercicio, tu API BookHaven deberá permitir:

1. **Libros (`books`)**

   - Crear libros.
   - Listar todos los libros.
   - Ver el detalle de un libro.
   - Actualizar libros.
   - Eliminar libros.

2. **Reseñas (`reviews`)**

   - Crear reseñas asociadas a un libro concreto.
   - Eliminar reseñas asociadas a un libro concreto.
   - Usar siempre URLs anidadas del tipo: `/books/{book}/reviews`.

3. **Categorías (`categories`)**
   - Crear categorías.
   - Eliminar categorías.
   - Listar todas las categorías.
   - Asignar una categoría a un libro.
   - Listar todos los libros de una categoría.

No trabajarás todavía:

- Autenticación ni permisos.
- Validación avanzada con FormRequests.
- API Resources.

---

## 📐 Parte 1 — CRUD completo de libros

Crea un controlador para los libros de la API.

### Requisitos del controlador de libros

Debe permitir:

- **Listar todos los libros**
  - Devolver un listado de todos los registros de libros.
- **Mostrar el detalle de un libro**
  - Devolver la información de un libro concreto a partir de su identificador.
- **Crear un nuevo libro**
  - Recibir los datos básicos de un libro y guardarlos en la base de datos.
- **Actualizar un libro existente**
  - Modificar los datos de un libro concreto.
- **Eliminar un libro**
  - Borrar un libro de la base de datos.

Utiliza únicamente los campos definidos como rellenables en el modelo `Book`.

### Rutas para libros

En el archivo de rutas de la API:

- Registra un conjunto de rutas de tipo recurso para `books`.
- Asegúrate de que los métodos HTTP y URLs siguen el patrón REST:
  - `GET` para listar y mostrar.
  - `POST` para crear.
  - `PUT` o `PATCH` para actualizar.
  - `DELETE` para eliminar.

---

## 📐 Parte 2 — Crear y eliminar reseñas de un libro

Crea un controlador para gestionar las reseñas de los libros, centrándote en la creación y eliminación.

### Requisitos del controlador de reseñas

Debe permitir:

- **Crear una reseña para un libro concreto**
  - Asociar la reseña tanto a un libro como a un usuario autor.
  - Utilizar los campos básicos de la reseña: contenido y puntuación, además de las claves externas necesarias.
- **Eliminar una reseña de un libro concreto**
  - Borrar una reseña concreta sabiendo a qué libro pertenece.

### Rutas para reseñas

Las rutas deben seguir esta estructura:

- La creación y eliminación de reseñas debe realizarse usando URLs basadas en libro, del tipo:

  - Crear reseña: `/books/{book}/reviews`
  - Eliminar reseña: `/books/{book}/reviews`

---

## 📐 Parte 3 — Gestión de categorías

Crea un controlador para las categorías de libros y configura las rutas necesarias.

### Requisitos del controlador de categorías

Debe permitir:

1. **Crear categorías**

- Dar de alta nuevas categorías en el sistema (nombre y descripción opcional).

2. **Eliminar categorías**

- Borrar una categoría concreta de la base de datos.

3. **Listar todas las categorías**

- Devolver el listado completo de categorías existentes.

4. **Asignar una categoría a un libro**

- Asociar una categoría existente a un libro mediante la relación muchos a muchos.

5. **Listar los libros de una categoría**

- Dado el identificador de una categoría, devolver todos los libros que pertenecen a esa categoría.

### Rutas para categorías

En las rutas de la API, define endpoints que permitan:

- Trabajar con categorías de forma directa:
  - Listar, crear, eliminar.
- Trabajar con la relación categorías–libros:
  - Asignar una categoría a un libro.
  - Listar libros de una categoría.

Las URLs deben ser coherentes con el dominio y claras respecto a:

- Sobre qué categoría se está operando.
- Sobre qué libro se realiza la asignación cuando se vincula una categoría.

---

## ▶️ Validación del ejercicio

Para considerar el ejercicio completado, deberás poder mostrar o explicar:

1. **Libros**

- Qué controlador maneja los libros.
- Qué rutas existen para el CRUD de libros.
- Un ejemplo de flujo: crear un libro, verlo en el listado, actualizarlo y eliminarlo.

2. **Reseñas**

- Cómo se crean reseñas usando la URL basada en libro (`/books/{book}/reviews`).
- Cómo se elimina una reseña de un libro concreto.
- Cómo se refleja la asociación entre reseña, libro y usuario.

3. **Categorías**

- Qué rutas existen para crear, eliminar y listar categorías.
- Cómo se asigna una categoría a un libro.
- Cómo se listan los libros de una categoría determinada.

4. **Coherencia de diseño**

- Que las rutas y controladores siguen un estilo REST razonable.
- Que se aprovechan las relaciones definidas en los modelos para obtener libros de una categoría y reseñas de un libro.
