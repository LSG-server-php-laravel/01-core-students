# PetRescue API — Demo (Observers)

## 🎯 Objetivo

Introducir el uso de **Observers** en Laravel para ejecutar lógica automáticamente cuando ocurre un cambio en un modelo.

En esta sesión se mostrará cómo **centralizar reglas del dominio** evitando duplicar lógica en controladores, seeders o factories.

---

## 🧠 Regla de dominio de la demo

En PetRescue existe la siguiente regla:

- Si una mascota tiene un valor en `adopted_by`,
- entonces su `status` debe ser **`adopted`**.

Esta regla debe cumplirse **siempre**, independientemente de dónde se actualice el modelo.

Para garantizarlo, se implementará mediante un **Observer**.

---

## 🛠 Comandos utilizados (Sail)

### Crear Factories

```bash
php artisan make:observer PetObserver --model=Pet
```

---

## 📂 Archivos implicados

### Observer

`app/Observers/PetObserver.php`

Clase encargada de escuchar cambios en el modelo `Pet`.

Responsabilidades:

- Detectar cuándo una mascota se guarda.
- Si `adopted_by` tiene valor, actualizar automáticamente el `status` a `adopted`.

---

### Registro del Observer

`app/Providers/AppServiceProvider.php`

En el método `boot()` se registra el observer:

- Se indica que el modelo `Pet` debe ser observado por `PetObserver`.

```php
Pet::observe(PetObserver::class);
```

Esto permite que Laravel ejecute automáticamente el observer cuando el modelo cambia.

---

### Modelo observado

`app/Models/Pet.php`

El modelo `Pet` ya contiene el trait:

```php
use HasFactory;
```

No requiere cambios adicionales para usar observers.

---

## ⚙️ Evento utilizado

En esta demo se utiliza el evento: **saving**

Este evento se ejecuta:

- antes de crear un modelo
- antes de actualizar un modelo

Esto permite aplicar la regla del dominio en ambos casos.

---

## 🧪 Comportamiento esperado

### Caso 1 — Crear mascota

Si se crea una mascota sin `adopted_by`:

- el `status` permanece como se haya definido.

---

### Caso 2 — Adoptar mascota

Si una mascota se actualiza y se asigna `adopted_by`:

- el observer cambia automáticamente el `status` a `adopted`.

Esto ocurre aunque:

- el controlador no modifique el campo `status`.

---

## 🧩 Ventajas de usar Observers

- Evitan duplicar lógica en controladores.
- Centralizan reglas del dominio.
- Funcionan igual desde:
  - controladores
  - seeders
  - factories
  - tests.

---

## 🔜 Próximos pasos

En próximas sesiones se verá cómo:

- optimizar consultas y respuestas de la API.
- mejorar el rendimiento usando caché.
- preparar la aplicación para entornos de producción.
