<?php
// Iniciar la captura de buffer para evitar problemas si hay errores
ob_start();

// Definir título y descripción para SEO
$page_title = 'Fabricación de Alta Calidad para la Industria Automotriz y de Electrodomésticos';
$page_description = 'Sepstar México ofrece servicios de fabricación OEM y ODM de alta calidad para las industrias automotriz y de electrodomésticos en América del Norte.';
$page_css = 'home';
$page_js = 'home';

try {
    // Incluir el archivo de cabecera
    require_once __DIR__ . '/includes/header.php';
    
    // Cargar textos específicos de la página
    $home_texts = load_language_file('home'); // Asegúrate de que load_language_file devuelva un array
} catch (Exception $e) {
    // Mostrar error en modo desarrollo
    if (ini_get('display_errors')) {
        echo "<div style='background-color: #ffcccc; border: 1px solid #ff0000; padding: 10px; margin: 10px;'>";
        echo "<strong>Error:</strong> " . $e->getMessage();
        echo "</div>";
    }
    // Registrar el error
    error_log("Error en index.php: " . $e->getMessage());
}

?>
<section class="hero-slider">
    <div class="owl-carousel hero-carousel">
        <div class="hero-slide" style="background-image: url('<?php echo BASE_URL; ?>img/fotos%20de%20fabrica%20y%20opengraph/fabrica%201.jpg');">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-lg-8 hero-content">
                        <h1 class="hero-title" data-aos="fade-up" data-aos-delay="100"><?php echo $home_texts['hero_title_1']; ?></h1>
                        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="300"><?php echo $home_texts['hero_subtitle_1']; ?></p>
                        <div data-aos="fade-up" data-aos-delay="500">
                            <a href="<?php echo BASE_URL; ?>about.php" class="btn btn-primary me-3"><?php echo $home_texts['learn_more']; ?></a>
                            <a href="<?php echo BASE_URL; ?>contact.php" class="btn btn-outline-light"><?php echo $home_texts['contact_us']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slide" style="background-image: url('<?php echo BASE_URL; ?>img/fotos%20de%20fabrica%20y%20opengraph/fabrica%202.jpg');">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-lg-8 hero-content">
                        <h1 class="hero-title" data-aos="fade-up" data-aos-delay="100"><?php echo $home_texts['hero_title_2']; ?></h1>
                        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="300"><?php echo $home_texts['hero_subtitle_2']; ?></p>
                        <div data-aos="fade-up" data-aos-delay="500">
                            <a href="<?php echo BASE_URL; ?>manufacturing.php" class="btn btn-primary me-3"><?php echo $home_texts['learn_more']; ?></a>
                            <a href="<?php echo BASE_URL; ?>products.php" class="btn btn-outline-light"><?php echo $home_texts['view_products']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slide" style="background-image: url('<?php echo BASE_URL; ?>img/fotos%20de%20fabrica%20y%20opengraph/fabrica%203.jpg');">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-lg-8 hero-content">
                        <h1 class="hero-title" data-aos="fade-up" data-aos-delay="100"><?php echo $home_texts['hero_title_3']; ?></h1>
                        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="300"><?php echo $home_texts['hero_subtitle_3']; ?></p>
                        <div data-aos="fade-up" data-aos-delay="500">
                            <a href="<?php echo BASE_URL; ?>contact.php" class="btn btn-primary"><?php echo $home_texts['contact_us']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <div class="about-image position-relative">
                    <img src="<?php echo BASE_URL; ?>img/equipo%20de%20trabajo%20o%20manufactura/equipo%20de%20trabajo%201.jpg" alt="<?php echo SITE_NAME; ?>" class="img-fluid rounded shadow">
                    <div class="about-experience">
                        <span>10+</span>
                        <span><?php echo $home_texts['years_exp']; ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="about-content">
                    <div class="section-title text-start">
                        <h2><?php echo $home_texts['about_title']; ?></h2>
                    </div>
                    <p><?php echo $home_texts['about_content']; ?></p>
                    <p><?php echo $home_texts['about_content_2']; ?></p>
                    <div class="about-feature">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="about-feature-item">
                                    <div class="about-feature-icon">
                                        <i class="fas fa-industry"></i>
                                    </div>
                                    <div>
                                        <h5><?php echo $home_texts['feature_1_title']; ?></h5>
                                        <p><?php echo $home_texts['feature_1_desc']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="about-feature-item">
                                    <div class="about-feature-icon">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                    <div>
                                        <h5><?php echo $home_texts['feature_2_title']; ?></h5>
                                        <p><?php echo $home_texts['feature_2_desc']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                            <a href="<?php echo BASE_URL; ?>about.php" class="btn btn-primary mt-4"><?php echo $home_texts['read_more']; ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section bg-light">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2><?php echo $home_texts['services_title']; ?></h2>
        </div>
        <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
            <?php echo $home_texts['services_subtitle']; ?>
        </p>
        
        <div class="row">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card">
                    <div class="service-image">
                        <img src="<?php echo BASE_URL; ?>img/productos/bomba%20peristaltica.jpg" alt="<?php echo $home_texts['service_1_title']; ?>">
                    </div>
                    <div class="service-content">
                        <h3><?php echo $home_texts['service_1_title']; ?></h3>
                        <p><?php echo $home_texts['service_1_desc']; ?></p>
                        <a href="<?php echo BASE_URL; ?>services/oem-manufacturing.php" class="btn btn-outline-primary"><?php echo $home_texts['learn_more']; ?></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card">
                    <div class="service-image">
                        <img src="<?php echo BASE_URL; ?>img/productos/panel%20de%20control%20lavavajillas.jpg" alt="<?php echo $home_texts['service_2_title']; ?>">
                    </div>
                    <div class="service-content">
                        <h3><?php echo $home_texts['service_2_title']; ?></h3>
                        <p><?php echo $home_texts['service_2_desc']; ?></p>
                        <a href="<?php echo BASE_URL; ?>services/odm-manufacturing.php" class="btn btn-outline-primary"><?php echo $home_texts['learn_more']; ?></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="service-card">
                    <div class="service-image">
                        <img src="<?php echo BASE_URL; ?>img/productos/luces%20traseras.jpg" alt="<?php echo $home_texts['service_3_title']; ?>">
                    </div>
                    <div class="service-content">
                        <h3><?php echo $home_texts['service_3_title']; ?></h3>
                        <p><?php echo $home_texts['service_3_desc']; ?></p>
                        <a href="<?php echo BASE_URL; ?>services/quality-control.php" class="btn btn-outline-primary"><?php echo $home_texts['learn_more']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Counter Section -->
<section class="counter-section py-5" style="background-image: url('<?php echo BASE_URL; ?>img/counter-bg.jpg'); background-attachment: fixed; background-size: cover; position: relative;">
    <div class="overlay" style="background-color: rgba(0,0,0,0.8); position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></div>
    <div class="container py-5 position-relative">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <div class="counter-item text-center text-white">
                    <div class="counter-icon">
                        <i class="fas fa-industry"></i>
                    </div>
                    <h2 class="counter-number" data-counter="12">0</h2>
                    <h5 class="counter-title"><?php echo $home_texts['counter_1']; ?></h5>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <div class="counter-item text-center text-white">
                    <div class="counter-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h2 class="counter-number" data-counter="100" data-suffix="+">0</h2>
                    <h5 class="counter-title"><?php echo $home_texts['counter_2']; ?></h5>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <div class="counter-item text-center text-white">
                    <div class="counter-icon">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <h2 class="counter-number" data-counter="500" data-suffix="+">0</h2>
                    <h5 class="counter-title"><?php echo $home_texts['counter_3']; ?></h5>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <div class="counter-item text-center text-white">
                    <div class="counter-icon">
                        <i class="fas fa-globe-americas"></i>
                    </div>
                    <h2 class="counter-number" data-counter="10" data-suffix="+">0</h2>
                    <h5 class="counter-title"><?php echo $home_texts['counter_4']; ?></h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="products-section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2><?php echo $home_texts['products_title']; ?></h2>
        </div>
        <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
            <?php echo $home_texts['products_subtitle']; ?>
        </p>
        
        <div class="product-filters" data-aos="fade-up" data-aos-delay="200">
            <button class="product-filter-btn active" data-filter="all" onclick="filterProducts('all')"><?php echo $home_texts['all_products']; ?></button>
            <button class="product-filter-btn" data-filter="automotive" onclick="filterProducts('automotive')"><?php echo $home_texts['automotive']; ?></button>
            <button class="product-filter-btn" data-filter="home-appliance" onclick="filterProducts('home-appliance')"><?php echo $home_texts['home_appliance']; ?></button>
            <button class="product-filter-btn" data-filter="industrial" onclick="filterProducts('industrial')"><?php echo $home_texts['industrial']; ?></button>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 product-item" data-category="automotive" data-aos="fade-up" data-aos-delay="100">
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?php echo BASE_URL; ?>img/productos/luces%20traseras.jpg" alt="<?php echo $home_texts['product_1_title']; ?>">
                    </div>
                    <div class="product-content">
                        <div class="product-category"><?php echo $home_texts['automotive']; ?></div>
                        <h3><?php echo $home_texts['product_1_title']; ?></h3>
                        <div class="product-bottom">
                            <a href="<?php echo BASE_URL; ?>products/automotive-product-1.php" class="btn btn-primary product-btn"><?php echo $home_texts['view_details']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 product-item" data-category="home-appliance" data-aos="fade-up" data-aos-delay="200">
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?php echo BASE_URL; ?>img/productos/panel%20de%20control%20lavadora.jpg" alt="<?php echo $home_texts['product_2_title']; ?>">
                    </div>
                    <div class="product-content">
                        <div class="product-category"><?php echo $home_texts['home_appliance']; ?></div>
                        <h3><?php echo $home_texts['product_2_title']; ?></h3>
                        <div class="product-bottom">
                            <a href="<?php echo BASE_URL; ?>products/home-appliance-product-1.php" class="btn btn-primary product-btn"><?php echo $home_texts['view_details']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 product-item" data-category="industrial" data-aos="fade-up" data-aos-delay="300">
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?php echo BASE_URL; ?>img/productos/bomba%20peristaltica.jpg" alt="<?php echo $home_texts['product_3_title']; ?>">
                    </div>
                    <div class="product-content">
                        <div class="product-category"><?php echo $home_texts['industrial']; ?></div>
                        <h3><?php echo $home_texts['product_3_title']; ?></h3>
                        <div class="product-bottom">
                            <a href="<?php echo BASE_URL; ?>products/industrial-product-1.php" class="btn btn-primary product-btn"><?php echo $home_texts['view_details']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 product-item" data-category="automotive" data-aos="fade-up" data-aos-delay="400">
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?php echo BASE_URL; ?>img/productos/panel%20de%20control%20lavavajillas.jpg" alt="<?php echo $home_texts['product_4_title']; ?>">
                    </div>
                    <div class="product-content">
                        <div class="product-category"><?php echo $home_texts['automotive']; ?></div>
                        <h3><?php echo $home_texts['product_4_title']; ?></h3>
                        <div class="product-bottom">
                            <a href="<?php echo BASE_URL; ?>products/automotive-product-2.php" class="btn btn-primary product-btn"><?php echo $home_texts['view_details']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 product-item" data-category="home-appliance" data-aos="fade-up" data-aos-delay="500">
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?php echo BASE_URL; ?>img/productos/manija%20del%20refrigerador.jpg" alt="<?php echo $home_texts['product_5_title']; ?>">
                    </div>
                    <div class="product-content">
                        <div class="product-category"><?php echo $home_texts['home_appliance']; ?></div>
                        <h3><?php echo $home_texts['product_5_title']; ?></h3>
                        <div class="product-bottom">
                            <a href="<?php echo BASE_URL; ?>products/home-appliance-product-2.php" class="btn btn-primary product-btn"><?php echo $home_texts['view_details']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 product-item" data-category="industrial" data-aos="fade-up" data-aos-delay="600">
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?php echo BASE_URL; ?>img/productos/panel%20de%20control%20lavadora.jpg" alt="<?php echo $home_texts['product_6_title']; ?>">
                    </div>
                    <div class="product-content">
                        <div class="product-category"><?php echo $home_texts['industrial']; ?></div>
                        <h3><?php echo $home_texts['product_6_title']; ?></h3>
                        <div class="product-bottom">
                            <a href="<?php echo BASE_URL; ?>products/industrial-product-2.php" class="btn btn-primary product-btn"><?php echo $home_texts['view_details']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4" data-aos="fade-up">
            <a href="<?php echo BASE_URL; ?>products.php" class="btn btn-primary"><?php echo $home_texts['view_all_products']; ?></a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section py-5" style="background-image: url('<?php echo BASE_URL; ?>img/cta-bg.jpg'); background-size: cover; background-position: center; position: relative;">
    <div class="overlay" style="background-color: rgba(0,56,179,0.85); position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></div>
    <div class="container py-5 position-relative">
        <div class="row align-items-center">
            <div class="col-lg-8 text-white mb-4 mb-lg-0">
                <h2 class="mb-3" data-aos="fade-up"><?php echo $home_texts['cta_title']; ?></h2>
                <p class="mb-0" data-aos="fade-up" data-aos-delay="100"><?php echo $home_texts['cta_text']; ?></p>
            </div>
            <div class="col-lg-4 text-lg-end" data-aos="fade-up" data-aos-delay="200">
                <a href="<?php echo BASE_URL; ?>contact.php" class="btn btn-light btn-lg"><?php echo $home_texts['contact_now']; ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Load AOS Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<!-- Load Owl Carousel -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- Advanced Counters -->
<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/counter-styles.css">
<script src="<?php echo BASE_URL; ?>js/advanced-counters.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Owl Carousel for hero slider
        $(".hero-carousel").owlCarousel({
            items: 1,
            loop: true,
            margin: 0,
            nav: true,
            dots: true,
            navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
            autoplay: true,
            autoplayTimeout: 7000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    nav: false
                },
                768: {
                    nav: true
                }
            }
        });
        
        // Asegurarse de que los contadores funcionen incluso si el script en home.js falla
        setTimeout(function() {
            const counters = document.querySelectorAll('.counter-number');
            if (counters.length > 0) {
                console.log("Verificando contadores desde index.php");
                counters.forEach(counter => {
                    if (counter.textContent === "0" || counter.textContent === "") {
                        // Si el contador sigue en cero, activar manualmente
                        const target = parseInt(counter.getAttribute('data-counter') || 0);
                        const suffix = counter.getAttribute('data-suffix') || '';
                        
                        // Animación simple como respaldo
                        let current = 0;
                        const increment = Math.ceil(target / 30);
                        
                        const timer = setInterval(() => {
                            current += increment;
                            if (current >= target) {
                                counter.textContent = target + suffix;
                                clearInterval(timer);
                            } else {
                                counter.textContent = current + suffix;
                            }
                        }, 50);
                    }
                });
            }
        }, 3000); // Dar tiempo suficiente para que el script principal trabaje primero
    });
</script>

<?php
try {
    // Incluir el archivo de pie de página
    require_once __DIR__ . '/includes/footer.php';
} catch (Exception $e) {
    // Mostrar error en modo desarrollo
    if (ini_get('display_errors')) {
        echo "<div style='background-color: #ffcccc; border: 1px solid #ff0000; padding: 10px; margin: 10px;'>";
        echo "<strong>Error al cargar el pie de página:</strong> " . $e->getMessage();
        echo "</div>";
    }
    // Registrar el error
    error_log("Error al cargar el pie de página en index.php: " . $e->getMessage());
}

// Finalizar la captura de buffer
$output = ob_get_clean();
echo $output;
?>
