# 📝 Ejercicio Autorización API

## 📚 BookHaven API — Autorización con Form Requests y Policies

En esta sesión has visto cómo **Laravel separa correctamente las decisiones de autorización** usando:

- `authorize()` en **Form Requests** para reglas de **contexto**.
- **Policies** para reglas de **dominio por recurso**.

En este ejercicio aplicarás esas ideas en **BookHaven**.

---

## 🎯 Objetivo general

Al finalizar el ejercicio, tu API BookHaven deberá:

- Bloquear acciones que **no tengan sentido según el estado del recurso**.
- Restringir acciones según **quién es el usuario** y **qué recurso intenta modificar**.
- Usar **Form Requests** y **Policies** de forma complementaria, respetando las buenas prácticas de Laravel.

---

## 🧠 Reglas funcionales del ejercicio

### 📘 Regla 1 — Libros finalizados

- Un libro con `status = finished`:
  - **no puede editarse ni eliminarse por nadie**.
- Esta regla **no depende del usuario**, solo del estado del libro.

---

### 👤 Regla 2 — Autor del libro

- Si un libro **no está finalizado**:
  - solo el **usuario que lo creó** puede:
    - editarlo,
    - eliminarlo.

---

## 📐 Parte 1 — Form Request para reglas de contexto

Implementa un **Form Request** para actualizar y eliminar libros que:

- Compruebe el estado del libro antes de ejecutar el controlador.
- Bloquee la petición si el libro está marcado como `finished`.
- Devuelva automáticamente un error de autorización cuando la acción no sea válida.

Esta lógica debe vivir en el método `authorize()` del Form Request.

---

## 📐 Parte 2 — Policy para reglas por recurso

Crea una **Policy** para el modelo `Book` que:

- Decida si un usuario puede:
  - actualizar un libro concreto,
  - eliminar un libro concreto.
- Permita la acción únicamente si:
  - el usuario autenticado es el creador del libro.

Esta lógica **no debe** comprobar el estado del libro.

---

## 📐 Parte 3 — Integración en el controlador

Modifica el controlador de libros para que:

- Use los Form Requests en las acciones de:
  - actualización,
  - eliminación.
- Llame explícitamente a la Policy antes de ejecutar la acción.
- No contenga:
  - comprobaciones manuales con `if`,
  - lógica de autorización mezclada con lógica de negocio.

---

## 🛡 Flujo esperado de autorización

El flujo correcto debe ser:

1. El usuario debe estar autenticado.
2. El Form Request decide si la acción tiene sentido según el estado del libro.
3. La Policy decide si el usuario puede actuar sobre ese libro concreto.
4. Si ambas comprobaciones pasan, la acción se ejecuta.

---

## 💡 Pista final

Si en algún momento dudas dónde poner una regla, pregúntate:

> **¿Depende del usuario o depende del estado del recurso?**

- Estado → Form Request
- Usuario + recurso → Policy
