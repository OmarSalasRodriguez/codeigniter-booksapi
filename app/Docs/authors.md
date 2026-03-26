# Controlador Authors - Estándares y Convenciones

## Información General

El controlador `Authors` gestiona las operaciones CRUD (Create, Read, Update, Delete) para el recurso "Autores". Utiliza el patrón de enrutamiento RESTful de CodeIgniter mediante el método `presenter()`.

---

## Métodos del Controlador

### index()

**Propósito:** Listado principal de todos los autores.

**Descripción:** Renderiza una vista con el listado completo de autores ordenados por ID descendente.

**Retorna:** Vista `authors/list.php` con array de autores.

**Flujo:**
1. Consulta todos los autores desde el modelo ordenados por `id DESC`
2. Pasa los datos a la vista
3. Renderiza la vista del listado

---

### show($id)

**Propósito:** Mostrar detalle de un autor específico.

**Descripción:** Renderiza una vista con la información de un autor y sus libros asociados.

**Parámetros:**
- `$id` (string|int): Identificador único del autor

**Retorna:** Vista `authors/authors-show.php` con datos del autor y sus libros, o lanza `PageNotFoundException` si no existe.

**Flujo:**
1. Convierte `$id` a entero
2. Busca el autor en la base de datos
3. Si no existe, lanza excepción 404
4. Consulta los libros asociados a ese autor
5. Renderiza la vista con ambos conjuntos de datos

---

### new()

**Propósito:** Mostrar formulario para crear un nuevo autor.

**Descripción:** Renderiza el formulario vacío de creación.

**Retorna:** Vista `authors/authors-create.php` (formulario vacío).

---

### create()

**Propósito:** Procesar la creación de un nuevo autor.

**Descripción:** Valida los datos del formulario y guarda el autor en la base de datos.

**Retorna:** Redirección a `/authors` con mensaje de éxito, o redirección con errores de validación.

**Flujo:**
1. Define reglas de validación (`name` requerido, mínimo 3 caracteres, máximo 255)
2. Valida los datos del request
3. Si hay errores: redirige al formulario con errores
4. Si es válido: inserta el autor en la base de datos
5. Redirige al listado con mensaje de éxito

---

### edit($id)

**Propósito:** Mostrar formulario para editar un autor existente.

**Parámetros:**
- `$id` (string|int): Identificador único del autor

**Retorna:** Vista `authors/authors-edit.php` con datos del autor, o lanza `PageNotFoundException` si no existe.

**Flujo:**
1. Convierte `$id` a entero
2. Busca el autor en la base de datos
3. Si no existe, lanza excepción 404
4. Renderiza el formulario pre-llenado con los datos actuales

---

### update($id)

**Propósito:** Procesar la actualización de un autor existente.

**Parámetros:**
- `$id` (string|int): Identificador único del autor

**Retorna:** Redirección a `/authors` con mensaje de éxito, o redirección con errores de validación.

**Flujo:**
1. Convierte `$id` a entero
2. Busca el autor en la base de datos
3. Si no existe, lanza excepción 404
4. Define reglas de validación
5. Valida los datos del request
6. Si hay errores: redirige al formulario con errores
7. Si es válido: actualiza el autor en la base de datos
8. Redirige al listado con mensaje de éxito

---

### delete($id)

**Propósito:** Eliminar un autor de la base de datos.

**Parámetros:**
- `$id` (string|int): Identificador único del autor

**Retorna:** Redirección a `/authors` con mensaje de éxito.

**Flujo:**
1. Convierte `$id` a entero
2. Busca el autor en la base de datos
3. Si no existe, lanza excepción 404
4. Elimina el autor de la base de datos
5. Redirige al listado con mensaje de éxito

---

## Rutas Asociadas

| Método HTTP | Ruta | Método Controlador |
|-------------|------|-------------------|
| GET | `/authors` | `index()` |
| GET | `/authors/new` | `new()` |
| GET | `/authors/show/{id}` | `show($id)` |
| GET | `/authors/edit/{id}` | `edit($id)` |
| POST | `/authors` | `create()` |
| POST | `/authors/update/{id}` | `update($id)` |
| POST | `/authors/delete/{id}` | `delete($id)` |

---

## Vistas Asociadas

| Archivo | Método | Descripción |
|---------|--------|-------------|
| `authors/list.php` | `index()` | Listado principal de autores |
| `authors/authors-show.php` | `show()` | Detalle del autor con sus libros |
| `authors/authors-create.php` | `new()` | Formulario de creación |
| `authors/authors-edit.php` | `edit()` | Formulario de edición |

---

## Convenciones de Código

### Tipado de Parámetros
- Los parámetros de URL llegan como string desde la URI
- Convertir a entero con `(int)` al inicio del método: `$id = (int) $id;`

### Validación
- Usar el validador de CodeIgniter con reglas definidas en el método
- Retornar errores con `redirect()->back()->withInput()->with('errors', ...)`

### Mensajes Flash
- Usar `redirect()->to()->with('message', ...)` para mensajes de éxito
- Mostrar en la vista con `session('message')`

### Seguridad
- Usar `esc()` para escapar datos en las vistas
- Incluir `csrf_field()` en todos los formularios POST
- Lanzar `PageNotFoundException` cuando un recurso no existe

---

## Modelo Asociado

El controlador utiliza `AuthorModel` que extiende de `CodeIgniter\Model` con las siguientes configuraciones implícitas:
- Tabla: `authors`
- Primary Key: `id`
- Validación automática activada
- Timestamps desactivados (no usa `created_at` ni `updated_at`)
