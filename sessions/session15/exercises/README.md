# 📝 Ejercicio — Observers

## 📚 BookHaven API — Automatización con Observers

En las sesiones anteriores has construido la API de **BookHaven** con:

- modelos y relaciones (`Book`, `Review`, `Category`)
- autenticación y autorización
- seeders y factories para generar datos

En esta sesión has visto cómo usar **Observers** para ejecutar lógica automáticamente cuando cambia un modelo.

El objetivo de este ejercicio es **mover ciertas reglas del dominio fuera de los controladores** y centralizarlas en observers.

---

## 🎯 Objetivo general

Al finalizar el ejercicio, tu aplicación deberá:

- Tener **observers definidos para algunos modelos clave**.
- Ejecutar lógica automática cuando se crean o actualizan registros.
- Mantener los **controladores lo más simples posible**, sin lógica repetida.

---

## 🧠 Idea clave del ejercicio

Los **Observers reaccionan a eventos del modelo**, por ejemplo:

- `creating`
- `created`
- `updating`
- `updated`
- `deleting`

Esto permite aplicar **reglas del dominio siempre**, independientemente de si el modelo se modifica desde:

- un controlador
- un seeder
- una factory
- un test.

---

## 📐 Parte 1 — Observer de libros

Crea un **observer para el modelo `Book`**.

### Reglas a implementar

#### 1️⃣ `creating`

Cuando se crea un libro:

- Si el campo `status` está vacío,
- debe asignarse automáticamente el estado:

`draft`

Esto evita que existan libros sin estado.

---

#### 2️⃣ `updating`

Cuando un libro cambia de estado a `finished`:

- el libro ya **no debería poder volver a editarse posteriormente**.

El observer debe impedir modificaciones posteriores si el libro ya estaba finalizado.

---

## 📐 Parte 2 — Observer de reseñas

Crea un **observer para el modelo `Review`**.

### Reglas a implementar

#### 1️⃣ `creating`

Cuando se crea una reseña:

- la puntuación debe mantenerse dentro del rango **1–5**.

Si el valor está fuera de ese rango:

- debe corregirse automáticamente.

---

#### 2️⃣ `created`

Cuando se crea una reseña:

- debe actualizarse el campo `reviews_count` del libro correspondiente.

Este campo representará el número de reseñas asociadas al libro.

---

## 📐 Parte 3 — Observer de categorías

Crea un **observer para el modelo `Category`**.

### Regla a implementar

#### `deleting`

Si se intenta eliminar una categoría:

- y existen libros asociados a ella,

el observer debe impedir la eliminación.

Esto evita romper la relación entre libros y categorías.

---

## ▶️ Registro de observers

Todos los observers deben registrarse en el proveedor correspondiente de la aplicación para que Laravel los ejecute automáticamente.

---

## 🧪 Qué debe permitir probar tu aplicación

Después de implementar los observers, debe ser posible comprobar que:

### Libros

- Los libros creados sin estado reciben automáticamente `draft`.
- Un libro marcado como `finished` ya no puede modificarse.

---

### Reseñas

- Las reseñas siempre tienen puntuaciones entre **1 y 5**.
- El contador de reseñas del libro se actualiza automáticamente.

---

### Categorías

- No se puede eliminar una categoría si todavía tiene libros asociados.

---

## ▶️ Validación del ejercicio

Para considerar el ejercicio completado, deberás poder explicar:

### Observers

- Qué observers has creado.
- Qué eventos utiliza cada uno.

### Reglas del dominio

- Qué reglas se han trasladado desde controladores a observers.

### Beneficios

- Por qué los observers permiten mantener el código más limpio.
- Cómo garantizan que ciertas reglas se cumplan siempre.

---

## 💡 Pista

Si una lógica debe ejecutarse **siempre que cambia un modelo**,
probablemente **pertenece a un observer**.
