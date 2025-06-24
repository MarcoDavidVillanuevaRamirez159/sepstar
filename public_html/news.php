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

// Cargar textos específicos de la página de noticias
$news_texts = load_language_file('news');

// Parámetros de paginación
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 9;
$offset = ($page - 1) * $items_per_page;

// Obtener categoría seleccionada (si existe)
$category = isset($_GET['category']) ? htmlspecialchars($_GET['category']) : null;

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

// TODO: Conectar con la base de datos y obtener las noticias
// Por ahora usaremos datos de ejemplo
$news_items = [
    [
        'id' => 1,
        'title' => 'Sepstar México expande su capacidad de producción',
        'excerpt' => 'Nueva línea de producción automatizada aumenta la capacidad en un 40%',
        'date' => '2025-06-20',
        'image' => '/img/news/expansion.jpg',
        'category' => 'Empresa'
    ],
    [
        'id' => 2,
        'title' => 'Certificación ISO 9001:2024 obtenida',
        'excerpt' => 'Compromiso continuo con la calidad y mejora de procesos',
        'date' => '2025-06-15',
        'image' => '/img/news/certification.jpg',
        'category' => 'Calidad'
    ],
    // Más noticias de ejemplo...
];

// Categorías de ejemplo
$categories = ['Empresa', 'Calidad', 'Innovación', 'Eventos', 'Productos'];

// Incluir el header
require_once '../includes/header.php';
?>

<!-- News Hero Section -->
<section class="news-hero bg-primary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4"><?php echo $news_texts['hero_title']; ?></h1>
                <p class="lead"><?php echo $news_texts['hero_subtitle']; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- News Content -->
<section class="news-content py-5">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Categories Filter -->
                <div class="categories-filter mb-4">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="/news.php" class="btn <?php echo !$category ? 'btn-primary' : 'btn-outline-primary'; ?>">
                            <?php echo $news_texts['all_categories']; ?>
                        </a>
                        <?php foreach($categories as $cat): ?>
                        <a href="/news.php?category=<?php echo urlencode($cat); ?>" 
                           class="btn <?php echo $category === $cat ? 'btn-primary' : 'btn-outline-primary'; ?>">
                            <?php echo $cat; ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- News Grid -->
                <div class="row g-4">
                    <?php foreach($news_items as $news): ?>
                    <div class="col-md-6">
                        <article class="card h-100 news-card">
                            <img src="<?php echo $news['image']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($news['title']); ?>">
                            <div class="card-body">
                                <div class="mb-2">
                                    <span class="badge bg-primary"><?php echo $news['category']; ?></span>
                                    <small class="text-muted ms-2"><?php echo format_date($news['date']); ?></small>
                                </div>
                                <h3 class="card-title h5">
                                    <a href="/news-detail.php?id=<?php echo $news['id']; ?>" class="text-dark text-decoration-none">
                                        <?php echo htmlspecialchars($news['title']); ?>
                                    </a>
                                </h3>
                                <p class="card-text"><?php echo htmlspecialchars($news['excerpt']); ?></p>
                                <a href="/news-detail.php?id=<?php echo $news['id']; ?>" class="btn btn-link p-0">
                                    <?php echo $news_texts['read_more']; ?> <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination -->
                <nav class="mt-5" aria-label="<?php echo $news_texts['pagination']; ?>">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Search Widget -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title h5 mb-3"><?php echo $news_texts['search_news']; ?></h4>
                        <form action="/news.php" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" placeholder="<?php echo $news_texts['search_placeholder']; ?>">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Featured News Widget -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title h5 mb-3"><?php echo $news_texts['featured_news']; ?></h4>
                        <div class="featured-news">
                            <?php foreach(array_slice($news_items, 0, 3) as $featured): ?>
                            <div class="featured-news-item mb-3">
                                <div class="row g-0">
                                    <div class="col-4">
                                        <img src="<?php echo $featured['image']; ?>" class="img-fluid rounded" alt="<?php echo htmlspecialchars($featured['title']); ?>">
                                    </div>
                                    <div class="col-8 ps-3">
                                        <h5 class="mb-1 h6">
                                            <a href="/news-detail.php?id=<?php echo $featured['id']; ?>" class="text-dark text-decoration-none">
                                                <?php echo htmlspecialchars($featured['title']); ?>
                                            </a>
                                        </h5>
                                        <small class="text-muted"><?php echo format_date($featured['date']); ?></small>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title h5 mb-3"><?php echo $news_texts['categories']; ?></h4>
                        <div class="categories-list">
                            <?php foreach($categories as $cat): ?>
                            <a href="/news.php?category=<?php echo urlencode($cat); ?>" class="d-flex justify-content-between align-items-center text-dark text-decoration-none mb-2">
                                <?php echo $cat; ?>
                                <span class="badge bg-primary rounded-pill">12</span>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
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
