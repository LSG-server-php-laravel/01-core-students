# 📝 Ejercicio — Factories

## 📚 BookHaven API — Factories de libros, reseñas y categorías

En las sesiones anteriores has poblado la base de datos de **BookHaven** usando **seeders manuales**, y después has aprendido a usar **Factories** para generar datos automáticos y escalables.

En este ejercicio ampliarás ese trabajo creando **factories adicionales** para completar el dominio de BookHaven.

---

## 🎯 Objetivo general

Al finalizar el ejercicio, BookHaven deberá:

- Tener factories definidas para:
  - usuarios,
  - libros,
  - reseñas,
  - categorías.
- Generar datos coherentes y realistas usando Faker.
- Usar **states** cuando tenga sentido para representar estados del dominio.
- Poblar la base de datos combinando **seeders + factories**.

---

## 🧠 Idea clave del ejercicio

- Cada **modelo importante** del dominio debe poder generarse mediante una factory.
- Las relaciones entre modelos deben resolverse desde las factories, no “a mano”.
- El objetivo no es solo volumen, sino **datos creíbles y relacionados**.

---

## 📐 Parte 1 — Factory de usuarios

Crea (o reutiliza) una factory para el modelo `User`.

### Requisitos

La factory debe:

- Generar nombres y emails realistas.
- Asignar una contraseña conocida para entorno de desarrollo.
- Permitir crear usuarios tanto de forma directa como desde otras factories.

---

## 📐 Parte 2 — Factory de libros

Crea una factory para el modelo `Book`.

### Requisitos básicos

La factory debe generar:

- Título, autor y resumen realistas.
- Un estado inicial del libro.
- Un usuario creador del libro (usando la factory de usuarios).

---

### Estados (states) del libro

Define al menos los siguientes **states**:

- **`draft`**
  - Libro editable.
- **`reading`**
  - Libro en proceso de lectura.
- **`finished`**
  - Libro finalizado (no editable).

Cada state debe modificar únicamente los campos necesarios.

---

## 📐 Parte 3 — Factory de reseñas

Crea una factory para el modelo `Review`.

### Requisitos

La factory debe generar:

- Contenido de la reseña.
- Una puntuación realista.
- Un usuario autor de la reseña.
- Un libro al que pertenece la reseña.

Las relaciones deben crearse automáticamente usando factories, sin pasar IDs manualmente.

---

## 📐 Parte 4 — Factory de categorías

Crea una factory para el modelo `Category`.

### Requisitos

La factory debe generar:

- Nombre de la categoría.
- Descripción opcional.

No es necesario que la factory asigne libros directamente; esa relación gestiónala desde los seeders.

---

## 📐 Parte 5 — Uso de factories desde seeders

Modifica los seeders existentes para usar las nuevas factories.

### Requisitos mínimos

- Crear algunos usuarios conocidos (para pruebas y login).
- Crear un conjunto de libros usando distintos states.
- Crear reseñas asociadas a algunos libros.
- Crear categorías y asignarlas a libros usando la relación muchos a muchos.

El resultado debe ser una base de datos con:

- libros en distintos estados,
- libros con y sin reseñas,
- libros asociados a varias categorías,
- distintos usuarios participando como creadores y autores de reseñas.

---

## 🧪 Qué debe permitir probar tu base de datos

Con los datos generados, debe ser posible:

- Listar libros con información variada.
- Ver libros con reseñas asociadas.
- Filtrar libros por categoría.
- Probar reglas de autorización vistas en sesiones anteriores
  (por ejemplo, libros finalizados no editables).

---

## ▶️ Validación del ejercicio

Para considerar el ejercicio completado, deberás poder mostrar o explicar:

1. **Factories**

   - Qué factories has creado.
   - Qué modelo cubre cada una.

2. **Relaciones**

   - Cómo se crean las relaciones entre:
     - libros y usuarios,
     - libros y reseñas,
     - libros y categorías.

3. **Seeders**

   - Cómo se combinan seeders y factories.
   - Qué parte genera datos “de escenario” y cuál genera volumen.

4. **Diseño**
   - Por qué las factories son la herramienta adecuada para este punto del proyecto.
   - Cómo esta solución escala sin cambiar la lógica de la API.
