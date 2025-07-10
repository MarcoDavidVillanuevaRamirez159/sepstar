<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';

// Obtener el ID de la noticia
$news_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// TODO: Obtener la noticia de la base de datos
// Por ahora usaremos datos de ejemplo
$all_news = [
    1 => [
        'id' => 1,
        'title' => 'Celebrando el Vigésimo Aniversario de Sepstar',
        'content' => '<p>Con gran orgullo y emoción, Sepstar celebra dos décadas de excelencia en la industria de componentes electrónicos. Este hito representa no solo años de arduo trabajo y dedicación, sino también innumerables historias de éxito junto a nuestros clientes y colaboradores.</p>
                     <p>A lo largo de estos 20 años, hemos:</p>
                     <ul>
                        <li>Desarrollado más de 500 productos innovadores</li>
                        <li>Establecido colaboraciones con las principales marcas de electrodomésticos</li>
                        <li>Expandido nuestras operaciones a múltiples países</li>
                        <li>Implementado tecnologías de última generación</li>
                        <li>Construido un equipo excepcional de profesionales</li>
                     </ul>
                     <p>Este aniversario marca un nuevo capítulo en nuestra historia, reafirmando nuestro compromiso con la innovación y la excelencia en la industria.</p>',
        'date' => '2025-06-15',
        'image' => '/img/NOTICIAS/noticias vigesimo aniversario/anniversary-1.jpg',
        'category' => 'Empresa',
        'author' => 'Equipo Sepstar',
        'tags' => ['Aniversario', 'Celebración', 'Innovación', 'Historia']
    ],
    2 => [
        'id' => 2,
        'title' => 'Celebrando el Año Nuevo 2025',
        'content' => '<p>La familia Sepstar se reunió para dar la bienvenida al 2025 con una espectacular celebración que reflejó nuestro espíritu de unidad y optimismo. El evento fue una oportunidad perfecta para celebrar los logros del año anterior y compartir nuestra visión para el futuro.</p>
                     <p>Durante la celebración:</p>
                     <ul>
                        <li>Reconocimos a los empleados destacados del año</li>
                        <li>Compartimos los logros más significativos de 2024</li>
                        <li>Presentamos nuestros objetivos para 2025</li>
                        <li>Disfrutamos de una cena especial con todo el equipo</li>
                     </ul>
                     <p>El ambiente festivo y la camaradería demostraron una vez más por qué Sepstar es más que una empresa: somos una familia comprometida con la excelencia.</p>',
        'date' => '2025-01-05',
        'image' => '/img/NOTICIAS/noticias feliz 2025/new-year-1.jpg',
        'category' => 'Eventos',
        'author' => 'Departamento de Recursos Humanos',
        'tags' => ['Año Nuevo', 'Celebración', 'Equipo', 'Logros']
    ],
    3 => [
        'id' => 3,
        'title' => 'Festival de Otoño en Wuhu: Fortaleciendo Lazos Internacionales',
        'content' => '<p>Nuestro equipo en Wuhu, China, celebró el tradicional Festival de Otoño con una hermosa ceremonia que unió a nuestros colaboradores de diferentes partes del mundo. Este evento anual es una muestra de nuestro compromiso con la diversidad cultural y el entendimiento internacional.</p>
                     <p>Aspectos destacados del festival:</p>
                     <ul>
                        <li>Ceremonia tradicional del té</li>
                        <li>Presentaciones culturales</li>
                        <li>Intercambio de regalos tradicionales</li>
                        <li>Cena especial con platillos típicos</li>
                     </ul>
                     <p>Estos eventos fortalecen nuestra cultura corporativa global y promueven el entendimiento entre diferentes culturas.</p>',
        'date' => '2024-09-25',
        'image' => '/img/NOTICIAS/noticias aniversario wuhu/wuhu-1.jpg',
        'category' => 'Internacional',
        'author' => 'Oficina de Wuhu',
        'tags' => ['Cultura', 'Internacional', 'Tradición', 'China']
    ],
    4 => [
        'id' => 4,
        'title' => 'Torneo de Bádminton Sepstar 2025',
        'content' => '<p>Como parte de nuestras iniciativas de bienestar y trabajo en equipo, organizamos el primer torneo de bádminton Sepstar, un evento que reunió a empleados de todos los departamentos en una competencia amistosa y emocionante.</p>
                     <p>El torneo incluyó:</p>
                     <ul>
                        <li>Competencias individuales y en parejas</li>
                        <li>Participación de más de 50 empleados</li>
                        <li>Premios y reconocimientos especiales</li>
                        <li>Actividades recreativas para toda la familia</li>
                     </ul>
                     <p>Estas actividades deportivas no solo promueven un estilo de vida saludable, sino que también fortalecen los lazos entre nuestros colaboradores.</p>',
        'date' => '2025-03-15',
        'image' => '/img/NOTICIAS/noticias-badminton/badminton-1.jpg',
        'category' => 'Eventos',
        'author' => 'Club Deportivo Sepstar',
        'tags' => ['Deporte', 'Bienestar', 'Equipo', 'Recreación']
    ],
    5 => [
        'id' => 5,
        'title' => 'Cruzando Fronteras: Reunión Global de Líderes',
        'content' => '<p>En un esfuerzo por fortalecer nuestra presencia global y alinear estrategias, los líderes de Sepstar de diferentes regiones se reunieron cara a cara en una histórica reunión que marcará el futuro de nuestra organización.</p>
                     <p>Temas clave discutidos:</p>
                     <ul>
                        <li>Estrategias de expansión global</li>
                        <li>Innovación en productos y servicios</li>
                        <li>Sostenibilidad y responsabilidad social</li>
                        <li>Desarrollo de talento internacional</li>
                     </ul>
                     <p>Esta reunión refuerza nuestro compromiso con la excelencia global y la colaboración internacional.</p>',
        'date' => '2025-05-20',
        'image' => '/img/NOTICIAS/cruzar miles de km cara a cara/meeting-global-1.jpg',
        'category' => 'Empresa',
        'author' => 'Dirección Global',
        'tags' => ['Global', 'Liderazgo', 'Estrategia', 'Innovación']
    ]
];

// Obtener la noticia específica
$news = isset($all_news[$news_id]) ? $all_news[$news_id] : null;

// Si no se encuentra la noticia, redirigir a la lista de noticias
if (!$news) {
    header('Location: /news.php');
    exit;
}

// Establecer el título y descripción de la página
$page_title = $news['title'];
$page_description = substr(strip_tags($news['content']), 0, 160);
$page_css = 'news';
$additional_head = '
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <!-- Medium Zoom CSS -->
    <link rel="stylesheet" href="https://unpkg.com/medium-zoom@1.0.6/dist/medium-zoom.css">
    <!-- Custom Styles -->
    <style>
        .reading-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: var(--article-primary);
            z-index: 1000;
            transition: width 0.3s ease;
        }
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
';

// Cargar textos específicos de la página de noticias
$news_texts = load_language_file('news');

// Establecer las migas de pan
$breadcrumbs = [
    '/news.php' => $news_texts['news_title'],
    '#' => $news['title']
];

// Incluir el header
require_once '../includes/header.php';
?>

<!-- Article Header -->
<section class="article-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="/news.php" class="text-muted">
                                <?php echo $news_texts['news_title']; ?>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php echo htmlspecialchars($news['category']); ?>
                        </li>
                    </ol>
                </nav>

                <!-- Article Meta -->
                <div class="article-meta mb-4">
                    <div class="d-flex align-items-center flex-wrap">
                        <span class="badge bg-primary rounded-pill px-3">
                            <?php echo htmlspecialchars($news['category']); ?>
                        </span>
                        <span class="text-muted ms-3">
                            <i class="far fa-calendar-alt"></i> 
                            <?php echo format_date($news['date']); ?>
                        </span>
                        <span class="text-muted ms-3">
                            <i class="far fa-clock"></i> 
                            <?php echo $news_texts['reading_time']; ?>: 
                            <?php echo ceil(str_word_count(strip_tags($news['content'])) / 200); ?> min
                        </span>
                    </div>
                </div>

                <!-- Article Title -->
                <h1 class="display-4 mb-4 fw-bold" data-aos="fade-up">
                    <?php echo htmlspecialchars($news['title']); ?>
                </h1>

                <!-- Author Info -->
                <div class="d-flex align-items-center mb-4" data-aos="fade-up" data-aos-delay="100"><img src="https://ui-avatars.com/api/?name=<?php echo urlencode($news['author']); ?>&background=0066cc&color=fff&size=50" 
                         alt="<?php echo htmlspecialchars($news['author']); ?>" 
                         class="rounded-circle" 
                         width="50" height="50">
                    <div class="ms-3">
                        <div class="fw-bold"><?php echo $news_texts['author']; ?></div>
                        <div><?php echo htmlspecialchars($news['author']); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="article-content py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- Featured Image -->
                <div class="featured-image mb-5" data-aos="fade-up">
                    <div class="position-relative">
                        <img src="<?php echo $news['image']; ?>" 
                             alt="<?php echo htmlspecialchars($news['title']); ?>" 
                             class="img-fluid rounded shadow-lg">
                        <div class="image-overlay"></div>
                    </div>
                    <div class="image-caption mt-2 text-center">
                        <small class="text-muted">
                            <?php echo htmlspecialchars($news['title']); ?> - <?php echo $news_texts['copyright']; ?> © Sepstar <?php echo date('Y'); ?>
                        </small>
                    </div>
                </div>

                <!-- Article Text -->
                <article class="article-text">
                    <?php echo $news['content']; ?>
                </article>                <!-- Article Footer -->
                <div class="article-footer mt-5 pt-4 border-top">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <!-- Tags -->
                            <div class="article-tags">
                                <h6 class="text-uppercase fw-bold mb-3">
                                    <i class="fas fa-tags me-2"></i> <?php echo $news_texts['tags']; ?>
                                </h6>
                                <div class="d-flex flex-wrap gap-2">
                                    <?php foreach($news['tags'] as $tag): ?>
                                    <a href="/news.php?tag=<?php echo urlencode($tag); ?>" 
                                       class="btn btn-sm btn-outline-secondary rounded-pill">
                                        #<?php echo htmlspecialchars($tag); ?>
                                    </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Share Buttons -->
                            <div class="article-share text-md-end mt-4 mt-md-0">
                                <h6 class="text-uppercase fw-bold mb-3">
                                    <i class="fas fa-share-alt me-2"></i> <?php echo $news_texts['share']; ?>
                                </h6>
                                <div class="d-flex gap-2 justify-content-md-end">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(SITE_URL . $_SERVER['REQUEST_URI']); ?>" 
                           class="btn btn-primary" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(SITE_URL . $_SERVER['REQUEST_URI']); ?>&text=<?php echo urlencode($news['title']); ?>" 
                           class="btn btn-info text-white" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(SITE_URL . $_SERVER['REQUEST_URI']); ?>&title=<?php echo urlencode($news['title']); ?>" 
                           class="btn btn-primary" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="whatsapp://send?text=<?php echo urlencode($news['title'] . ' ' . SITE_URL . $_SERVER['REQUEST_URI']); ?>" 
                           class="btn btn-success" target="_blank">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="article-navigation mt-5 pt-4 border-top">
                    <div class="row">
                        <?php
                        // Encontrar noticias anterior y siguiente
                        $prev_news = null;
                        $next_news = null;
                        $found_current = false;
                        
                        foreach ($all_news as $n) {
                            if ($n['id'] == $news['id']) {
                                $found_current = true;
                            } elseif (!$found_current) {
                                $prev_news = $n;
                            } elseif ($found_current && !$next_news) {
                                $next_news = $n;
                                break;
                            }
                        }
                        ?>
                        
                        <div class="col-6">
                            <?php if ($prev_news): ?>
                            <a href="/news-detail.php?id=<?php echo $prev_news['id']; ?>" 
                               class="text-decoration-none text-muted d-flex align-items-center">
                                <i class="fas fa-arrow-left me-3"></i>
                                <div>
                                    <small class="d-block text-primary"><?php echo $news_texts['previous']; ?></small>
                                    <span class="fw-bold"><?php echo htmlspecialchars($prev_news['title']); ?></span>
                                </div>
                            </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-6 text-end">
                            <?php if ($next_news): ?>
                            <a href="/news-detail.php?id=<?php echo $next_news['id']; ?>" 
                               class="text-decoration-none text-muted d-flex align-items-center justify-content-end">
                                <div>
                                    <small class="d-block text-primary"><?php echo $news_texts['next']; ?></small>
                                    <span class="fw-bold"><?php echo htmlspecialchars($next_news['title']); ?></span>
                                </div>
                                <i class="fas fa-arrow-right ms-3"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related News -->
<section class="related-news py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h6 class="text-primary text-uppercase fw-bold mb-2" data-aos="fade-up">
                <?php echo $news_texts['discover_more']; ?>
            </h6>
            <h2 class="display-5 mb-3" data-aos="fade-up" data-aos-delay="100">
                <?php echo $news_texts['related_news']; ?>
            </h2>
            <div class="section-line mx-auto" data-aos="fade-up" data-aos-delay="200"></div>
        </div>
        <div class="row g-4">
            <?php 
            // Obtener noticias relacionadas (excluyendo la actual)
            $related_news = array_filter($all_news, function($item) use ($news) {
                return $item['id'] != $news['id'] && (
                    $item['category'] == $news['category'] || 
                    count(array_intersect($item['tags'], $news['tags'])) > 0
                );
            });
            
            // Limitar a 3 noticias
            $related_news = array_slice($related_news, 0, 3);
            
            foreach($related_news as $related): 
            ?>
            <div class="col-md-4">
                <article class="card h-100 news-card" data-aos="fade-up">
                    <div class="card-img-wrapper">
                        <img src="<?php echo htmlspecialchars($related['image']); ?>" 
                             class="card-img-top" 
                             alt="<?php echo htmlspecialchars($related['title']); ?>">
                        <div class="card-img-overlay d-flex align-items-end">
                            <span class="badge bg-primary"><?php echo htmlspecialchars($related['category']); ?></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <small class="text-muted">
                                <i class="far fa-calendar-alt"></i> 
                                <?php echo format_date($related['date']); ?>
                            </small>
                        </div>
                        <h3 class="card-title h5">
                            <a href="/news-detail.php?id=<?php echo $related['id']; ?>" 
                               class="text-dark text-decoration-none stretched-link">
                                <?php echo htmlspecialchars($related['title']); ?>
                            </a>
                        </h3>
                        <p class="card-text">
                            <?php echo substr(strip_tags($related['content']), 0, 100) . '...'; ?>
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <div class="d-flex align-items-center">
                            <div class="tags flex-grow-1">
                                <?php foreach(array_slice($related['tags'], 0, 2) as $tag): ?>
                                <span class="badge bg-light text-secondary me-1">
                                    #<?php echo htmlspecialchars($tag); ?>
                                </span>
                                <?php endforeach; ?>
                            </div>
                            <a href="/news-detail.php?id=<?php echo $related['id']; ?>" 
                               class="btn btn-link p-0 text-primary">
                                <?php echo $news_texts['read_more']; ?> 
                                <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>
