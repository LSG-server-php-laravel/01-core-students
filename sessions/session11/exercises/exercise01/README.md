# 📝 Ejercicio Autenticación API

## 📚 BookHaven API — Auth con Sanctum y buenas prácticas

En la demo has implementado autenticación básica en la API usando **Laravel Sanctum** y **Form Requests** para validar el registro y el login.

En este ejercicio vas **añadir** y a **consolidar** esa implementación en la API de **BookHaven**, añadiendo comportamientos habituales en APIs reales.

---

## 🎯 Objetivo general

Al finalizar el ejercicio, tu API BookHaven deberá:

- Gestionar autenticación por token de forma correcta.
- Validar el registro y el login usando **Form Requests**.
- Limitar intentos de login para evitar abusos.
- Controlar explícitamente qué datos se devuelven en las respuestas de Auth.
- Permitir cerrar sesión:
  - del dispositivo actual,
  - o de todos los dispositivos del usuario.

---

## 🔐 Parte 1 — Registro y login con Form Requests

Asegúrate de que:

- El **registro** de usuarios:
  - usa un Form Request dedicado,
  - valida nombre, email y contraseña,
  - no permite emails duplicados.
- El **login**:
  - usa un Form Request dedicado,
  - valida email y contraseña,
  - devuelve un error de autenticación cuando las credenciales son incorrectas.

El controlador de autenticación **no debe contener validación manual**.

---

## ⏱ Parte 2 — Rate limit en el login

Protege el endpoint de login frente a intentos repetidos.

### Requisitos

- Aplica un límite de intentos al endpoint de login usando mecanismos propios de Laravel.
- Cuando se supera el límite:
  - la API debe responder con un error adecuado.
- El registro de usuarios no debe verse afectado por esta limitación.

El objetivo es introducir una primera medida de seguridad.

---

## 📤 Parte 3 — Control del formato de salida (output)

A partir de ahora, las respuestas de autenticación **no deben devolver el usuario completo**.

### Requisitos

En las respuestas de:

- registro,
- login,
- perfil del usuario autenticado (`me`),

solo deben devolverse los siguientes campos:

- id
- name
- email

No deben aparecer:

- contraseña,
- timestamps,
- campos internos del modelo.

El formato de salida debe ser **coherente** en todas las rutas de Auth.

---

## 🚪 Parte 4 — Logout y logout global

Amplía la funcionalidad de logout.

### Requisitos

La API debe permitir:

1. **Logout del dispositivo actual**

   - Revocar únicamente el token con el que se hace la petición.

2. **Logout de todos los dispositivos**
   - Revocar todos los tokens del usuario autenticado.
   - Tras esta acción, ningún token previo debe seguir siendo válido.

Ambas acciones deben requerir autenticación.

---

## 🛡 Protección de rutas (recordatorio)

- Las rutas de consulta del catálogo (listar libros, ver detalle) pueden mantenerse públicas.
- Las rutas que modifican datos deben:
  - requerir autenticación mediante token.

No es necesario todavía:

- distinguir permisos entre usuarios,
- decidir quién puede editar o borrar qué recurso.

Eso se resolverá más adelante con **Policies**.

---

## 📐 Requisitos técnicos

- Usar **Laravel Sanctum** para la autenticación.
- Usar **Form Requests** para:
  - registro,
  - login.
- No usar:
  - policies,
  - middlewares personalizados,
  - comprobaciones manuales complejas de permisos.
- El código debe seguir buenas prácticas de Laravel:
  - controladores simples,
  - validación separada,
  - responsabilidades claras.

---

## ▶️ Validación del ejercicio

Para considerar el ejercicio completado, deberás poder mostrar o explicar:

1. **Auth**

   - Cómo se registra un usuario.
   - Cómo se genera un token al hacer login.
   - Cómo se identifica al usuario autenticado.

2. **Rate limit**

   - Qué ocurre cuando se supera el número de intentos de login.
   - Qué respuesta devuelve la API.

3. **Respuestas**

   - Qué datos se devuelven en register, login y me.
   - Que no se filtran campos sensibles.

4. **Logout**

   - Diferencia entre logout del dispositivo actual y logout global.
   - Qué ocurre con los tokens después de cada acción.

5. **Diseño**
   - Que el ejercicio no adelanta temario de autorización.
   - Que la solución queda preparada para añadir Policies más adelante sin refactorizar.

---
