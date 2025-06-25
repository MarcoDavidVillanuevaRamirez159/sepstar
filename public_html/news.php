<?php
// Iniciar la captura de buffer para evitar problemas si hay errores
ob_start();

// Definir título y descripción para SEO
$page_title = 'Noticias';
$page_description = 'Noticias y actualizaciones de Sepstar México, fabricante líder de componentes para las industrias automotriz y de electrodomésticos.';
$page_css = 'news';
$page_js = 'news';

try {
    // Incluir el archivo de cabecera
    require_once __DIR__ . '/../includes/header.php';
    require_once __DIR__ . '/../modules/config/config.php';
    require_once __DIR__ . '/../modules/functions/functions.php';
} catch (Exception $e) {
    // Si hay un error, mostrarlo en desarrollo
    if (ini_get('display_errors')) {
        echo "<div style='background-color: #ffcccc; border: 1px solid #ff0000; padding: 10px; margin: 10px;'>";
        echo "<strong>Error:</strong> " . $e->getMessage();
        echo "</div>";
    }
    // Registrar el error
    error_log("Error en news.php: " . $e->getMessage());
}

?>

<!-- News Hero Section -->
<section class="news-hero py-5" style="background: url('<?php echo BASE_URL; ?>/img/headernews.png') no-repeat center center; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Noticias y Actualizaciones</h1>
                <p class="lead">Descubre las últimas novedades, logros y eventos de Sepstar México. Mantente informado sobre nuestra innovación, calidad y crecimiento.</p>
            </div>
        </div>
    </div>
</section>

<?php
try {
    // Incluir el archivo de pie de página
    require_once __DIR__ . '/../includes/footer.php';
} catch (Exception $e) {
    // Si hay un error, mostrarlo en desarrollo
    if (ini_get('display_errors')) {
        echo "<div style='background-color: #ffcccc; border: 1px solid #ff0000; padding: 10px; margin: 10px;'>";
        echo "<strong>Error al cargar el pie de página:</strong> " . $e->getMessage();
        echo "</div>";
    }
    // Registrar el error
    error_log("Error al cargar el pie de página en news.php: " . $e->getMessage());
}

// Finalizar la captura de buffer
$output = ob_get_clean();
echo $output;
?>
