# Sepstar México - Versión HTML Estática

Este directorio contiene la versión HTML estática del sitio web de Sepstar México, convertida desde la versión PHP original.

## Estructura del Sitio

### Páginas Principales

- `index.html` - Página de inicio
- `about.html` - Sobre nosotros
- `manufacturing.html` - Capacidad de fabricación
- `products.html` - Productos
- `news.html` - Noticias
- `contact.html` - Contacto

### Directorios

- `css/` - Archivos de estilos CSS
- `js/` - Archivos JavaScript
- `img/` - Todas las imágenes y recursos multimedia

## Características

### Contenido Estático

- Todos los textos están en español
- Contenido extraído de los archivos de idioma PHP originales
- Navegación completamente funcional entre páginas
- Enlaces internos actualizados para HTML

### Funcionalidades Implementadas

- Diseño responsivo con Bootstrap 5
- Animaciones AOS (Animate On Scroll)
- Carrusel de imágenes en la página principal
- Formularios de contacto (requiere backend para funcionar)
- Botón de WhatsApp
- Botón "Volver arriba"
- Cookie consent banner

### Librerías Externas Incluidas

- Bootstrap 5.3.0
- Font Awesome 6.4.0
- jQuery 3.7.0
- AOS (Animate On Scroll)
- Swiper.js
- OwlCarousel 2

## Instalación y Uso

### Método 1: Servidor Web Local

1. Copie todo el contenido de la carpeta `html-version` a su servidor web
2. Abra `index.html` en su navegador
3. El sitio debe funcionar completamente

### Método 2: Visualización Directa

1. Abra `index.html` directamente en su navegador
2. Algunas funcionalidades podrían tener limitaciones debido a las políticas CORS

## Funcionalidades que Requieren Backend

### Formularios

- **Formulario de contacto**: Necesita un script de servidor para procesar los mensajes
- **Newsletter**: Requiere integración con servicio de email marketing
- **Búsqueda**: Funcionalidad de búsqueda requiere backend

### Sugerencias de Implementación

Para hacer funcionales los formularios, puede:

1. Usar servicios como Formspree, Netlify Forms, o EmailJS
2. Implementar un backend simple en PHP, Node.js, o Python
3. Integrar con servicios de third-party como Mailchimp para newsletters

## Diferencias con la Versión PHP

### Eliminado

- Sistema de gestión de idiomas dinámico
- Base de datos y funcionalidades de backend
- Sistema de sesiones
- Generación dinámica de contenido

### Convertido a Estático

- Todos los textos en español
- Enlaces y navegación
- Meta tags y SEO
- Estructura de archivos simplificada

## Personalización

### Cambiar Contenido

Para modificar textos, edite directamente los archivos HTML correspondientes.

### Agregar Nuevas Páginas

1. Cree un nuevo archivo HTML
2. Copie la estructura de navegación de las páginas existentes
3. Actualice los enlaces en todas las páginas

### Modificar Estilos

Los estilos están organizados en:

- `css/style.css` - Estilos principales
- `css/home.css` - Estilos específicos de la página de inicio
- `css/manufacturing.css` - Estilos de la página de fabricación
- `css/news.css` - Estilos de la página de noticias

## SEO y Optimización

### Incluido

- Meta tags optimizados para cada página
- Structured data (JSON-LD)
- URLs amigables
- Imágenes con alt text
- Sitemap (recomendado agregar)

### Recomendaciones Adicionales

- Comprimir imágenes para mejor rendimiento
- Implementar lazy loading para imágenes
- Agregar robots.txt personalizado
- Configurar redirects 301 si viene de versión PHP

## Soporte y Mantenimiento

### Navegadores Compatibles

- Chrome (última versión)
- Firefox (última versión)
- Safari (última versión)
- Edge (última versión)
- IE 11+ (compatibilidad limitada)

### Actualizaciones

Para actualizar el contenido:

1. Edite los archivos HTML directamente
2. Modifique las imágenes en la carpeta `img/`
3. Ajuste estilos en los archivos CSS

## Contacto de Desarrollo

Para soporte técnico o modificaciones adicionales, contacte al equipo de desarrollo.

---

**Nota**: Esta es una conversión completa de PHP a HTML estático. Todas las funcionalidades dinámicas han sido removidas o convertidas a estático para máxima compatibilidad y simplicidad de hosting.
