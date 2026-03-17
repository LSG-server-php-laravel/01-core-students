# PetRescue — Demo (Blade básico)

## 🎯 Objetivo

Añadir una **interfaz web con Blade** a la API de PetRescue ya existente.

En esta sesión se aprenderá a:

- Renderizar vistas con Blade.
- Reutilizar un **layout principal**.
- Usar **directivas de Blade**.
- Trabajar con **rutas nombradas**.
- Crear **formularios HTML** conectados con controladores.
- Usar **flash messages** después de acciones del usuario.
- Proteger rutas con **autenticación basada en sesión**.

El objetivo no es crear una interfaz compleja, sino entender **cómo Laravel conecta rutas, controladores y vistas Blade reutilizando la lógica de la API**.

---

## ⚙️ Preparación del entorno

Para que los estilos y scripts funcionen correctamente es necesario ejecutar los comandos de Node dentro del entorno de Sail.

Ejecutar:

```bash
./vendor/bin/sail npm install
```

Después iniciar el servidor de desarrollo de Vite:

```bash
./vendor/bin/sail npm run dev
```

Esto compilará los assets y permitirá cargar correctamente **Tailwind y los scripts del proyecto**.

---

## 🧠 Conceptos principales

## Blade

Blade es el **motor de plantillas de Laravel**.

Permite:

- insertar variables en HTML
- usar estructuras de control
- reutilizar layouts
- generar interfaces dinámicas

Las vistas se guardan en:

```text
resources/views
```

---

## 📂 Archivos implicados

### Layout principal

```text
resources/views/layouts/app.blade.php
```

Responsabilidad:

- estructura base de la página
- navegación
- mensajes flash
- errores de validación
- definir la zona donde se renderizará el contenido.

### Vista de listado de mascotas

```text
resources/views/pets/index.blade.php
```

Responsabilidad:

- mostrar la lista de mascotas
- generar enlaces a acciones como ver o eliminar.

### Vista de creación de mascota

```text
resources/views/pets/create.blade.php
```

Responsabilidad:

- mostrar el formulario para crear una mascota.

### Controlador

```text
app/Http/Controllers/PetController.php
```

Responsabilidad:

- reutilizar la lógica de la API
- devolver **JSON o vistas Blade** según el tipo de petición.

### Rutas web

```text
routes/web.php
```

Responsabilidad:

- definir las rutas que devuelven vistas
- proteger acciones de escritura con auth.

---

## 🧩 Directivas Blade utilizadas

Durante la sesión se introducirán las directivas más comunes.

### Mostrar datos

```php
{{ $variable }}
```

Escapa automáticamente el contenido para evitar problemas de seguridad.

### Estructuras de control

Condicionales:

```php
@if
@elseif
@else
@endif
```

Bucles:

```php
@foreach
@endforeach
```

También se usará:

```php
@forelse
@empty
@endforelse
```

Para mostrar estados vacíos cuando no haya datos.

### Layouts

Blade permite reutilizar plantillas mediante:

```php
@extends
@section
@yield
```

Esto permite definir una **estructura base** y reutilizarla en todas las páginas.

---

## 🧭 Rutas nombradas

Laravel permite generar URLs mediante nombres de rutas.

Ejemplos usados en la demo:

```php
route('pets.index')
route('pets.create')
route('pets.store')
route('pets.destroy')
```

Ventajas:

- no dependemos de URLs fijas
- el código es más mantenible.

---

## 📝 Formularios en Blade

Los formularios HTML trabajan junto con las rutas del controlador.

Ejemplo conceptual:

```php
<form action="{{ route('pets.store') }}" method="POST">
```

### Protección CSRF

Todos los formularios deben incluir:

```php
@csrf
```

Laravel valida automáticamente este token.

### Métodos HTTP

HTML solo soporta:

- GET
- POST

Laravel permite simular otros métodos mediante Blade:

```php
@method('PUT')
@method('PATCH')
@method('DELETE')
```

Esto permite trabajar con **rutas REST** desde formularios HTML.

---

## 🔐 Autorización en vistas

Blade permite mostrar elementos solo si el usuario tiene permiso.

Ejemplo usado en la demo:

```php
@can('delete', $pet)
```

Esto conecta con las **política de Laravel (_policies_)**.

---

## 💬 Flash messages

Después de acciones como:

- crear
- editar
- eliminar

el controlador puede enviar un **mensaje temporal** a la sesión.

Ejemplo:

```php
return redirect()
    ->route('pets.index')
    ->with('status', 'Mascota creada correctamente.');
```

En Blade se puede mostrar el mensaje almacenado en sesión.

---

## 🔐 Autenticación web con sesión

Las acciones de escritura están protegidas mediante:

```php
Route::middleware('auth')
```

Esto significa que el usuario debe haber iniciado sesión.

Laravel usa **sesiones y cookies** para mantener la autenticación en aplicaciones web.

---

## 🎨 Estilos con Tailwind

La interfaz utiliza **Tailwind CSS**.

Los estilos se cargan mediante Vite:

```php
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

Las clases de Tailwind se aplican directamente en el HTML Blade.

---

## 🧪 Flujo que se probará en la demo

Durante la sesión se demostrará el siguiente flujo:

1. Acceder al listado de mascotas.
2. Iniciar sesión.
3. Ir al formulario de creación.
4. Crear una mascota.
5. Redirigir al listado.
6. Mostrar un mensaje de confirmación.
7. Eliminar una mascota.

Esto permitirá ver cómo se conectan:

- rutas
- controladores
- vistas Blade
- sesión
- formularios
