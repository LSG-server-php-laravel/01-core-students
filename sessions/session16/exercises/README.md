# 📝 Ejercicio — Vistas CRUD

## 📚 BookHaven — CRUD de libros, auth y reseñas

En las sesiones anteriores has construido **BookHaven** con:

- modelos y relaciones (`Book`, `Review`, `Category`, `User`)
- rutas, controladores y validación
- autenticación y autorización

En esta sesión vas a dar el paso hacia una aplicación web completa con **vistas Blade**.

El objetivo de este ejercicio es **crear la parte visual de la aplicación** para gestionar libros y reseñas desde la interfaz.

---

## 🎯 Objetivo general

Al finalizar el ejercicio, tu aplicación deberá:

- Tener **autenticación funcional** para acceder a la aplicación.
- Permitir gestionar **libros con sus vistas CRUD**.
- Permitir gestionar **reseñas asociadas a los libros** desde la interfaz.

---

## 🧠 Idea clave del ejercicio

La aplicación debe permitir trabajar con **BookHaven como una web clásica con Blade**, mostrando formularios y listados para interactuar con los datos.

Las funcionalidades principales deben quedar organizadas alrededor de:

- libros
- autenticación
- reseñas dentro de la vista de cada libro

La idea es que el usuario pueda navegar por la aplicación y gestionar la información sin usar herramientas externas como Postman o Insomnia.

---

## 📐 Parte 1 — Vistas CRUD de libros

Crea las **vistas necesarias para el CRUD del modelo `Book`**.

### Reglas a implementar

#### 1️⃣ Listado de libros

Debe existir una vista para:

- mostrar todos los libros
- acceder al formulario de creación
- acceder al formulario de edición
- acceder a la vista de detalle del libro

---

#### 2️⃣ Crear, editar y eliminar libros

Debes tener formularios para:

- crear un libro nuevo
- editar un libro existente
- eliminar un libro existente

Todas estas operaciones deben hacerse desde vistas Blade.

---

#### 3️⃣ Vista de detalle del libro

Cada libro debe tener su propia vista de detalle.

En esa vista deben verse:

- los datos principales del libro
- sus reseñas asociadas
- las acciones necesarias para gestionar esas reseñas

No debe existir una vista independiente para listar reseñas por separado.

---

## 📐 Parte 2 — Auth

Activa la **autenticación** en la aplicación para que los usuarios puedan iniciar sesión y trabajar con BookHaven.

### Reglas a implementar

#### 1️⃣ Acceso autenticado

Debes permitir:

- registrar usuarios o utilizar el sistema de auth que hayáis trabajado en clase
- iniciar sesión
- cerrar sesión

---

#### 2️⃣ Protección de rutas

Las rutas de la aplicación deben quedar protegidas de forma coherente para que solo los usuarios autenticados puedan gestionar el contenido necesario.

La navegación de la interfaz debe reflejar correctamente si un usuario ha iniciado sesión o no.

---

## 📐 Parte 3 — CRUD de reseñas

Crea las vistas y acciones necesarias para gestionar reseñas de libros.

### Regla a implementar

#### Gestión integrada en la vista del libro

Las reseñas deben poder:

- crearse
- editarse
- eliminarse

Pero esta gestión debe hacerse **dentro de la vista del libro** o desde flujos conectados a ella.

No quieres:

- una vista propia de listado de reseñas
- una vista `show` individual para una reseña

---

## ▶️ Organización de las vistas

Las vistas deben quedar organizadas de forma clara dentro de `resources/views`, separando lo correspondiente a:

- libros
- autenticación
- reseñas si necesitas parciales o formularios reutilizables

La estructura debe ser coherente y fácil de mantener.

---

## 🧪 Qué debe permitir probar tu aplicación

Después de implementar las vistas, debe ser posible comprobar que:

### Libros

- Se pueden listar, crear, editar y eliminar libros.
- Cada libro tiene una vista de detalle funcional.

---

### Reseñas

- Las reseñas se ven dentro de la vista del libro.
- Las reseñas se pueden crear, editar y eliminar.
- No existe una pantalla separada para listar todas las reseñas ni un `show` propio de cada reseña.

---

### Auth

- El usuario puede iniciar sesión y cerrar sesión.
- Las rutas protegidas funcionan correctamente.

---

## ▶️ Validación del ejercicio

Para considerar el ejercicio completado, deberás poder enseñar y explicar:

### Libros

- Qué vistas has creado para el CRUD de libros.
- Cómo se navega entre listado, creación, edición y detalle.

### Reseñas

- Cómo has integrado el CRUD de reseñas dentro de la vista del libro.
- Por qué no existe una vista independiente de reseñas ni un `show` de reseña.

### Auth

- Qué sistema de autenticación has utilizado.
- Qué partes de la aplicación requieren estar autenticado.

---

## 💡 Pista

Si una funcionalidad pertenece claramente a un recurso como `Book` o `Review`,
sus vistas, rutas y controladores deberían reflejar esa organización de forma clara.
