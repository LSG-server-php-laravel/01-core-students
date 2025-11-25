# PetRescue API — Demo (Modelos + Relaciones)

## 🎯 Objetivo

En esta sesión añadimos la capa de **modelos Eloquent** para trabajar con la tabla `pets`
y definimos las **relaciones** entre `User` y `Pet`:

- Crear el modelo `Pet`.
- Definir quién ha creado la mascota (`created_by`).
- Definir quién la ha adoptado (`adopted_by`).
- Añadir relaciones `hasMany` en el modelo `User`.
- Repasar la diferencia entre `hasMany` y `belongsTo`.

### 📖 Documentación oficial

https://laravel.com/docs/12.x/eloquent

---

## 📂 Archivos modificados

- `app/Models/Pet.php` (nuevo)
- `app/Models/User.php` (relaciones añadidas)

### 🛠 Comando para generar el modelo automáticamente

```bash
./vendor/bin/sail artisan make:model Pet
```

---

## ✅ Modelo `Pet`

El modelo `Pet`:

- Utiliza `HasFactory`.
- Permite asignar masivamente los campos:
  - name, species, age, status, description,
  - created_by, adopted_by.
- Define dos relaciones:
  - `creator`: usuario que ha registrado la mascota.
  - `adopter`: usuario que ha adoptado la mascota.

---

## ✅ Modelo `User`

El modelo `User` ahora incluye:

- `createdPets`: relación `hasMany` hacia `Pet` usando la clave `created_by`.
- `adoptedPets`: relación `hasMany` hacia `Pet` usando la clave `adopted_by`.

---

## 🔍 Conceptos clave de la sesión

- **Eloquent Model**: representación de una tabla de la base de datos en PHP.
- **belongsTo**:
  - Se define en el modelo que guarda la clave foránea.
  - Ejemplo: una mascota pertenece a un usuario creador.
- **hasMany**:
  - Se define en el modelo "dueño" de la relación.
  - Ejemplo: un usuario puede tener muchas mascotas creadas.

---

## ⚙️ Algunas propiedades configurables en un modelo Eloquent

```php
class Pet extends Model
{
    // Nombre de la tabla (por defecto: plural del modelo en snake_case)
    protected $table = 'pets';

    // Clave primaria (por defecto: 'id')
    protected $primaryKey = 'id';

    // Tipo de clave primaria (por defecto: 'int')
    protected $keyType = 'int';

    // Auto-incremento (por defecto: true)
    public $incrementing = true;

    // Timestamps automáticos (por defecto: true)
    public $timestamps = true;

    // Nombres personalizados para timestamps
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';

    // Conexión de base de datos (si tienes múltiples)
    protected $connection = 'mysql';

    // Campos asignables masivamente
    protected $fillable = ['name', 'species', 'age'];

    // Campos ocultos al serializar (JSON/Array)
    protected $hidden = ['password', 'token'];

    // Campos que son fechas
    protected $dates = ['deleted_at', 'published_at'];

    // Añadir atributos personalizados al array/JSON
    protected $appends = ['full_name', 'age_in_months'];

    // Accessor para 'full_name'
    public function getFullNameAttribute()
    {
        return $this->name . ' (' . $this->species . ')';
    }

    // Accessor para 'age_in_months'
    public function getAgeInMonthsAttribute()
    {
        return $this->age * 12;
    }
}
```
