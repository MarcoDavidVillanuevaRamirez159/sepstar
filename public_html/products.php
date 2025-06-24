<?php
// Iniciar la captura de buffer para evitar problemas si hay errores
ob_start();

// Definir título y descripción para SEO
$page_title = 'Nuestros Productos';
$page_description = 'Explore nuestro catálogo completo de productos para las industrias automotriz y de electrodomésticos, incluyendo componentes de alta calidad y soluciones personalizadas.';
$page_css = 'products';
$page_js = 'products';

try {
    // Incluir el archivo de cabecera
    require_once __DIR__ . '/../includes/header.php';

// Cargar textos específicos de la página
$products_texts = load_language_file('products');

// Definir breadcrumbs
$breadcrumbs = [
    '/products.php' => $products_texts['page_title']
];
} catch (Exception $e) {
    // Si hay un error, mostrarlo en desarrollo
    if (ini_get('display_errors')) {
        echo "<div style='background-color: #ffcccc; border: 1px solid #ff0000; padding: 10px; margin: 10px;'>";
        echo "<strong>Error:</strong> " . $e->getMessage();
        echo "</div>";
    }
    // Registrar el error
    error_log("Error en products.php: " . $e->getMessage());
}
?>

<!-- Page Banner -->
<section class="page-banner" style="background-image: url('<?php echo BASE_URL; ?>/img/hero/hero noticias.jpg');">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-6">
                <div class="page-banner-content" data-aos="fade-right">
                    <h1 class="page-banner-title"><?php echo $products_texts['page_title']; ?></h1>
                    <p class="page-banner-subtitle"><?php echo $products_texts['page_subtitle']; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products Introduction Section -->
<section class="products-intro py-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5" data-aos="fade-up">
                <h2 class="section-title"><?php echo $products_texts['products_title']; ?></h2>
                <p class="section-subtitle"><?php echo $products_texts['products_subtitle']; ?></p>
                <p class="lead"><?php echo $products_texts['products_desc']; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="featured-products py-5 bg-light">
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col-lg-8" data-aos="fade-up">
                <h3 class="section-title"><?php echo $products_texts['featured_products']; ?></h3>
                <p class="section-subtitle"><?php echo $products_texts['featured_desc']; ?></p>
            </div>
        </div>
        
        <div class="row">
            <!-- Featured Product 1 -->
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="product-card h-100 bg-white rounded shadow overflow-hidden">
                    <div class="product-image">
                        <img src="/img/product1.jpg" alt="<?php echo $products_texts['product1_name']; ?>" class="img-fluid w-100">
                        <div class="product-overlay">
                            <a href="/product-detail.php?id=1" class="btn btn-primary"><?php echo $products_texts['view_details']; ?></a>
                        </div>
                    </div>
                    <div class="product-content p-4">
                        <h4 class="product-title"><?php echo $products_texts['product1_name']; ?></h4>
                        <p class="product-description"><?php echo $products_texts['product1_desc']; ?></p>
                        <div class="product-features">
                            <span class="badge bg-light text-dark me-2 mb-2">High Efficiency</span>
                            <span class="badge bg-light text-dark me-2 mb-2">Temperature Resistant</span>
                            <span class="badge bg-light text-dark me-2 mb-2">Low Energy</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Featured Product 2 -->
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="product-card h-100 bg-white rounded shadow overflow-hidden">
                    <div class="product-image">
                        <img src="/img/product2.jpg" alt="<?php echo $products_texts['product2_name']; ?>" class="img-fluid w-100">
                        <div class="product-overlay">
                            <a href="/product-detail.php?id=2" class="btn btn-primary"><?php echo $products_texts['view_details']; ?></a>
                        </div>
                    </div>
                    <div class="product-content p-4">
                        <h4 class="product-title"><?php echo $products_texts['product2_name']; ?></h4>
                        <p class="product-description"><?php echo $products_texts['product2_desc']; ?></p>
                        <div class="product-features">
                            <span class="badge bg-light text-dark me-2 mb-2">Touch Interface</span>
                            <span class="badge bg-light text-dark me-2 mb-2">Water Resistant</span>
                            <span class="badge bg-light text-dark me-2 mb-2">Long Life</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Featured Product 3 -->
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="product-card h-100 bg-white rounded shadow overflow-hidden">
                    <div class="product-image">
                        <img src="/img/product3.jpg" alt="<?php echo $products_texts['product3_name']; ?>" class="img-fluid w-100">
                        <div class="product-overlay">
                            <a href="/product-detail.php?id=3" class="btn btn-primary"><?php echo $products_texts['view_details']; ?></a>
                        </div>
                    </div>
                    <div class="product-content p-4">
                        <h4 class="product-title"><?php echo $products_texts['product3_name']; ?></h4>
                        <p class="product-description"><?php echo $products_texts['product3_desc']; ?></p>
                        <div class="product-features">
                            <span class="badge bg-light text-dark me-2 mb-2">Precision</span>
                            <span class="badge bg-light text-dark me-2 mb-2">Corrosion Resistant</span>
                            <span class="badge bg-light text-dark me-2 mb-2">Safety Certified</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products Catalog Section -->
<section class="products-catalog py-5">
    <div class="container py-4">
        <div class="row">
            <!-- Sidebar Filters -->
            <div class="col-lg-3 mb-5 mb-lg-0">
                <div class="product-filters sticky-top" style="top: 100px;" data-aos="fade-right">
                    <div class="filter-section bg-white rounded shadow p-4 mb-4">
                        <h4><?php echo $products_texts['categories_title']; ?></h4>
                        <ul class="list-unstyled category-list">
                            <li class="active">
                                <a href="#" class="d-block py-2">
                                    <?php echo $products_texts['all_categories']; ?>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-block py-2">
                                    <?php echo $products_texts['category1']; ?>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-block py-2">
                                    <?php echo $products_texts['category2']; ?>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-block py-2">
                                    <?php echo $products_texts['category3']; ?>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-block py-2">
                                    <?php echo $products_texts['category4']; ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="filter-section bg-white rounded shadow p-4">
                        <h4><?php echo $products_texts['filters_title']; ?></h4>
                        <div class="mb-3">
                            <label for="sortBy" class="form-label"><?php echo $products_texts['sort_by']; ?></label>
                            <select class="form-select" id="sortBy">
                                <option value="newest"><?php echo $products_texts['newest']; ?></option>
                                <option value="popular"><?php echo $products_texts['popular']; ?></option>
                                <option value="price_low"><?php echo $products_texts['price_low']; ?></option>
                                <option value="price_high"><?php echo $products_texts['price_high']; ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Products Grid -->
            <div class="col-lg-9">
                <div class="row">
                    <!-- Product 1 -->
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="product-card h-100 bg-white rounded shadow overflow-hidden">
                            <div class="product-image">
                                <img src="/img/product1.jpg" alt="<?php echo $products_texts['product1_name']; ?>" class="img-fluid w-100">
                                <div class="product-overlay">
                                    <a href="/product-detail.php?id=1" class="btn btn-primary"><?php echo $products_texts['view_details']; ?></a>
                                </div>
                            </div>
                            <div class="product-content p-4">
                                <h4 class="product-title"><?php echo $products_texts['product1_name']; ?></h4>
                                <p class="product-description"><?php echo $products_texts['product1_desc']; ?></p>
                            </div>
                            <div class="product-footer p-4 pt-0 d-flex justify-content-between">
                                <a href="#" class="text-primary"><i class="fas fa-download me-1"></i> <?php echo $products_texts['download_spec']; ?></a>
                                <a href="/contact.php?product=1" class="text-primary"><i class="fas fa-envelope me-1"></i> <?php echo $products_texts['request_quote']; ?></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 2 -->
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-card h-100 bg-white rounded shadow overflow-hidden">
                            <div class="product-image">
                                <img src="/img/product2.jpg" alt="<?php echo $products_texts['product2_name']; ?>" class="img-fluid w-100">
                                <div class="product-overlay">
                                    <a href="/product-detail.php?id=2" class="btn btn-primary"><?php echo $products_texts['view_details']; ?></a>
                                </div>
                            </div>
                            <div class="product-content p-4">
                                <h4 class="product-title"><?php echo $products_texts['product2_name']; ?></h4>
                                <p class="product-description"><?php echo $products_texts['product2_desc']; ?></p>
                            </div>
                            <div class="product-footer p-4 pt-0 d-flex justify-content-between">
                                <a href="#" class="text-primary"><i class="fas fa-download me-1"></i> <?php echo $products_texts['download_spec']; ?></a>
                                <a href="/contact.php?product=2" class="text-primary"><i class="fas fa-envelope me-1"></i> <?php echo $products_texts['request_quote']; ?></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 3 -->
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="product-card h-100 bg-white rounded shadow overflow-hidden">
                            <div class="product-image">
                                <img src="/img/product3.jpg" alt="<?php echo $products_texts['product3_name']; ?>" class="img-fluid w-100">
                                <div class="product-overlay">
                                    <a href="/product-detail.php?id=3" class="btn btn-primary"><?php echo $products_texts['view_details']; ?></a>
                                </div>
                            </div>
                            <div class="product-content p-4">
                                <h4 class="product-title"><?php echo $products_texts['product3_name']; ?></h4>
                                <p class="product-description"><?php echo $products_texts['product3_desc']; ?></p>
                            </div>
                            <div class="product-footer p-4 pt-0 d-flex justify-content-between">
                                <a href="#" class="text-primary"><i class="fas fa-download me-1"></i> <?php echo $products_texts['download_spec']; ?></a>
                                <a href="/contact.php?product=3" class="text-primary"><i class="fas fa-envelope me-1"></i> <?php echo $products_texts['request_quote']; ?></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 4 -->
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="product-card h-100 bg-white rounded shadow overflow-hidden">
                            <div class="product-image">
                                <img src="/img/product4.jpg" alt="<?php echo $products_texts['product4_name']; ?>" class="img-fluid w-100">
                                <div class="product-overlay">
                                    <a href="/product-detail.php?id=4" class="btn btn-primary"><?php echo $products_texts['view_details']; ?></a>
                                </div>
                            </div>
                            <div class="product-content p-4">
                                <h4 class="product-title"><?php echo $products_texts['product4_name']; ?></h4>
                                <p class="product-description"><?php echo $products_texts['product4_desc']; ?></p>
                            </div>
                            <div class="product-footer p-4 pt-0 d-flex justify-content-between">
                                <a href="#" class="text-primary"><i class="fas fa-download me-1"></i> <?php echo $products_texts['download_spec']; ?></a>
                                <a href="/contact.php?product=4" class="text-primary"><i class="fas fa-envelope me-1"></i> <?php echo $products_texts['request_quote']; ?></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 5 -->
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-card h-100 bg-white rounded shadow overflow-hidden">
                            <div class="product-image">
                                <img src="/img/product5.jpg" alt="<?php echo $products_texts['product5_name']; ?>" class="img-fluid w-100">
                                <div class="product-overlay">
                                    <a href="/product-detail.php?id=5" class="btn btn-primary"><?php echo $products_texts['view_details']; ?></a>
                                </div>
                            </div>
                            <div class="product-content p-4">
                                <h4 class="product-title"><?php echo $products_texts['product5_name']; ?></h4>
                                <p class="product-description"><?php echo $products_texts['product5_desc']; ?></p>
                            </div>
                            <div class="product-footer p-4 pt-0 d-flex justify-content-between">
                                <a href="#" class="text-primary"><i class="fas fa-download me-1"></i> <?php echo $products_texts['download_spec']; ?></a>
                                <a href="/contact.php?product=5" class="text-primary"><i class="fas fa-envelope me-1"></i> <?php echo $products_texts['request_quote']; ?></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 6 -->
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="product-card h-100 bg-white rounded shadow overflow-hidden">
                            <div class="product-image">
                                <img src="/img/product6.jpg" alt="<?php echo $products_texts['product6_name']; ?>" class="img-fluid w-100">
                                <div class="product-overlay">
                                    <a href="/product-detail.php?id=6" class="btn btn-primary"><?php echo $products_texts['view_details']; ?></a>
                                </div>
                            </div>
                            <div class="product-content p-4">
                                <h4 class="product-title"><?php echo $products_texts['product6_name']; ?></h4>
                                <p class="product-description"><?php echo $products_texts['product6_desc']; ?></p>
                            </div>
                            <div class="product-footer p-4 pt-0 d-flex justify-content-between">
                                <a href="#" class="text-primary"><i class="fas fa-download me-1"></i> <?php echo $products_texts['download_spec']; ?></a>
                                <a href="/contact.php?product=6" class="text-primary"><i class="fas fa-envelope me-1"></i> <?php echo $products_texts['request_quote']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pagination -->
                <div class="row mt-4">
                    <div class="col-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><?php echo $products_texts['previous']; ?></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><?php echo $products_texts['next']; ?></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Custom Solutions CTA Section -->
<section class="cta-section py-5 bg-primary text-white">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0" data-aos="fade-right">
                <h2 class="m-0"><?php echo $products_texts['cta_title']; ?></h2>
                <p class="lead mb-0"><?php echo $products_texts['cta_text']; ?></p>
            </div>
            <div class="col-lg-4 text-center text-lg-end" data-aos="fade-left">
                <a href="/contact.php" class="btn btn-light btn-lg"><?php echo $products_texts['cta_button']; ?></a>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize product filter functionality
    const categoryLinks = document.querySelectorAll('.category-list li a');
    const sortBySelect = document.getElementById('sortBy');
    
    // Category filter
    categoryLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all links
            categoryLinks.forEach(link => {
                link.parentElement.classList.remove('active');
            });
            
            // Add active class to clicked link
            this.parentElement.classList.add('active');
            
            // Here you would normally filter the products
            // For now, just show a console message
            console.log('Filter by category: ' + this.textContent.trim());
        });
    });
    
    // Sort filter
    if (sortBySelect) {
        sortBySelect.addEventListener('change', function() {
            console.log('Sort by: ' + this.value);
            // Here you would implement the sorting logic
        });
    }
    
    // Product hover effect
    const productCards = document.querySelectorAll('.product-card');
    
    productCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.querySelector('.product-overlay').style.opacity = '1';
        });
        
        card.addEventListener('mouseleave', function() {
            this.querySelector('.product-overlay').style.opacity = '0';
        });
    });
});
</script>

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
    error_log("Error al cargar el pie de página en products.php: " . $e->getMessage());
}

// Finalizar la captura de buffer
$output = ob_get_clean();
echo $output;
?>
