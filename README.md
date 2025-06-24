# Sepstar México - Sitio Web Corporativo

Este repositorio contiene el código fuente para el sitio web corporativo de Sepstar México, una empresa de fabricación que atiende a clientes OEM y ODM en las industrias automotriz y de electrodomésticos en América del Norte.

## Estructura del Proyecto

```
PAGINA SEPSTAR/
├── includes/             # Archivos de inclusión PHP comunes
│   ├── config.php        # Configuración global
│   ├── functions.php     # Funciones comunes
│   ├── header.php        # Encabezado común del sitio
│   └── footer.php        # Pie de página común del sitio
│
├── languages/            # Archivos de idioma
│   ├── es/               # Español (idioma predeterminado)
│   ├── en/               # Inglés
│   └── zh/               # Chino
│
├── public_html/          # Directorio raíz público
│   ├── admin/            # Panel de administración
│   ├── css/              # Hojas de estilo
│   ├── js/               # Archivos JavaScript
│   ├── img/              # Imágenes
│   ├── .htaccess         # Configuración de Apache
│   ├── index.php         # Página de inicio
│   ├── about.php         # Página Sobre nosotros
│   ├── manufacturing.php # Página de Capacidad de fabricación
│   ├── products.php      # Página de Productos
│   ├── news.php          # Página de Noticias
│   ├── contact.php       # Página de Contacto
│   └── ...
```

## Requisitos Técnicos

- PHP 7.4 o superior
- MySQL 5.7 o superior
- Servidor web Apache con mod_rewrite habilitado

## Características

- Diseño responsivo
- Soporte multilingüe (Español, Inglés, Chino)
- URLs amigables para SEO
- Optimización para motores de búsqueda
- Panel de administración para gestión de contenido
- Formulario de contacto
- Integración con Google Maps
- Optimización de rendimiento

## Instalación

### Configuración de la base de datos

1. Cree una base de datos MySQL para el sitio web.
2. Importe el archivo `database.sql` incluido en la carpeta raíz.
3. Actualice los valores de conexión en `includes/config.php`.

### Configuración del servidor web

1. Configure su servidor web para que apunte al directorio `public_html`.
2. Asegúrese de que el módulo `mod_rewrite` esté habilitado en Apache.
3. Verifique que los permisos de archivo sean correctos:
   - Directorios: 755
   - Archivos: 644

## Personalización

### Contenido

Para modificar el contenido del sitio:

1. Edite los archivos de idioma correspondientes en la carpeta `languages/`.
2. Para contenido dinámico, utilice el panel de administración accesible en `/admin/`.

### Diseño

Para personalizar el diseño:

1. Modifique los archivos CSS en `public_html/css/`.
2. Para cambios de estructura, modifique los archivos PHP correspondientes.

## Optimización

El sitio incluye varias optimizaciones:

- Compresión GZIP para archivos CSS y JS
- Caché de navegador configurable
- Minificación de archivos CSS y JavaScript
- Imágenes optimizadas
- Estructura HTML semántica para mejor SEO

## Publicación en Neubox

### Requisitos de Hosting

Asegúrese de que su plan de hosting en Neubox cumpla con:

1. Soporte para PHP 7.4 o superior
2. MySQL 5.7 o superior
3. Soporte para .htaccess y mod_rewrite

### Subir archivos

1. Use FTP o el Administrador de Archivos de Neubox para subir los contenidos de la carpeta `public_html` al directorio público de su hosting (generalmente `public_html` o `www`).
2. Suba la carpeta `includes` y `languages` al directorio raíz de su hosting, fuera del directorio público.
3. Modifique las rutas en `includes/config.php` según sea necesario para adaptarse a la estructura de su servidor.

### Configurar base de datos

1. Utilice phpMyAdmin o el gestor de bases de datos de Neubox para crear una nueva base de datos.
2. Importe el archivo `database.sql`.
3. Actualice la configuración de la base de datos en `includes/config.php`.

### Configurar dominio

1. En el panel de control de Neubox, configure su dominio para que apunte a la carpeta pública.
2. Asegúrese de que los registros DNS estén correctamente configurados.

## Soporte

Para preguntas o problemas relacionados con este sitio web, póngase en contacto con el administrador del sistema.

## Licencia

Este código es propiedad de Sepstar México. Todos los derechos reservados.

---

Documentación generada por [GitHub Copilot](https://github.com/features/copilot)
