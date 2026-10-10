Proyecto de la clase Produccion Web Turno Noche 2do cuatrimestre 2026

## 🚀 Cómo abrir y levantar el proyecto en XAMPP

Para ejecutar este proyecto en tu entorno local, sigue estos pasos:

1. **Descargar o Clonar:** Descarga este repositorio como archivo `.zip` o clónalo mediante Git.
2. **Ubicación del proyecto:** Descomprime o mueve la carpeta del proyecto dentro del directorio raíz de tu servidor local. En XAMPP, esta ruta por defecto es:
   `C:\xampp\htdocs\`
3. **Renombrar (Opcional):** Si tu carpeta se llama, por ejemplo, `proyecto_web`, la ruta final en tu PC debería verse como `C:\xampp\htdocs\proyecto_web\`.
4. **Iniciar el servidor:** Abre el panel de control de XAMPP y presiona el botón **Start** en el módulo de **Apache**.
5. **Acceder en el navegador:** Abre tu navegador web de preferencia y escribe la siguiente ruta:
   `http://localhost/proyecto_web/`
   *(Sustituye `proyecto_web` por el nombre exacto que le hayas puesto a la carpeta en tu `htdocs`).*

Listado de Vistas y URLs

A continuación, se listan todas las vistas disponibles en el proyecto asumiendo que tu carpeta en `htdocs` se llama `proyecto_web`. 

### 🌐 Sitio Público (Front-end)
Vistas accesibles para cualquier usuario o cliente.

* **Inicio (Productos Destacados):**
  `http://localhost/proyecto_web/public/home.php`
* **Catálogo de Productos (Con filtros):**
  `http://localhost/proyecto_web/public/productos.php`
* **Detalle de Producto (Con comentarios):**
  `http://localhost/proyecto_web/public/detalle_producto.php?id=1` *(El ID varía según el producto)*
* **Contacto:**
  `http://localhost/proyecto_web/public/contacto.php`

### 🔒 Panel de Administración (Back-end)
Vistas de gestión. Requiren iniciar sesión con un usuario válido.

* **Login (Ingreso al sistema):**
  `http://localhost/proyecto_web/public/admin/login.php`
* **Registro de nuevos usuarios:**
  `http://localhost/proyecto_web/public/admin/register.php`
* **Dashboard / Menú Principal Admin:**
  `http://localhost/proyecto_web/public/admin/home.php`
* **Gestión de Productos:**
  `http://localhost/proyecto_web/public/admin/productos.php`
* **Gestión de Categorías:**
  `http://localhost/proyecto_web/public/admin/categorias.php`
* **Gestión de Marcas:**
  `http://localhost/proyecto_web/public/admin/marcas.php`
* **Gestión de Usuarios:**
  `http://localhost/proyecto_web/public/admin/usuarios.php`
* **Gestión de Perfiles/Permisos:**
  `http://localhost/proyecto_web/public/admin/perfiles.php`
* **Gestión de Comentarios (Por producto):**
  `http://localhost/proyecto_web/public/admin/comentarios.php?id=1`

### 🛠️ Páginas de Utilidad
* **Enrutador principal (Redirige automáticamente al Login):**
  `http://localhost/proyecto_web/index.php`
* **Página de Error (404 Not Found):**
  `http://localhost/proyecto_web/404.php`