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
    require_once __DIR__ . '/includes/header.php';

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
<section class="page-banner" style="background-image: url('<?php echo BASE_URL; ?>img/productos/headerproductis.png'); background-size: cover; background-position: center; min-height: 440px; position: relative;">
    <!-- Overlay eliminado para quitar fondo azul -->
    <div class="container h-100 position-relative" style="z-index:2;">
        <div class="row h-100 align-items-center">
            <div class="col-lg-7">
                <div class="page-banner-content text-white" data-aos="fade-right">
                    <h1 class="page-banner-title display-4 fw-bold mb-3"><?php echo $products_texts['page_title']; ?></h1>
                    <p class="page-banner-subtitle lead mb-0"><?php echo $products_texts['page_subtitle']; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products Introduction Section (movido más abajo con mayor separación) -->
<section class="products-intro py-5" style="padding-top: 5rem !important;">
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5" data-aos="fade-up">
                <h2 class="section-title display-5 fw-bold mb-3"><?php echo $products_texts['products_title']; ?></h2>
                <p class="section-subtitle lead mb-2"><?php echo $products_texts['products_subtitle']; ?></p>
                <p class="lead text-muted"><?php echo $products_texts['products_desc']; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="featured-products py-5 bg-light">
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col-lg-8" data-aos="fade-up">
                <h3 class="section-title fw-bold mb-2"><?php echo $products_texts['featured_products']; ?></h3>
                <p class="section-subtitle text-muted mb-0"><?php echo $products_texts['featured_desc']; ?></p>
            </div>
        </div>
        <div class="row">
            <!-- Producto 1 -->
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="product-card h-100 bg-white rounded shadow overflow-hidden">
                    <div class="product-image position-relative" style="background:#f8f9fa; min-height:220px; display:flex; align-items:center; justify-content:center;">
                        <img src="<?php echo BASE_URL; ?>img/productos/luces%20traseras.jpg" alt="Luces traseras automotrices" class="img-fluid" style="max-height:180px; object-fit:contain;">
                        <div class="product-overlay d-flex align-items-center justify-content-center" style="opacity:0; transition:opacity .3s; position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,56,179,0.7);">
                            <a href="<?php echo BASE_URL; ?>product-detail.php?id=1" class="btn btn-primary">Ver detalles</a>
                        </div>
                    </div>
                    <div class="product-content p-4">
                        <h4 class="product-title fw-bold mb-2">Luces traseras automotrices</h4>
                        <p class="product-description text-muted mb-2">Iluminación LED de alta eficiencia y durabilidad para vehículos modernos.</p>
                        <div class="product-features mb-2">
                            <span class="badge bg-light text-dark me-2 mb-2">Alta eficiencia</span>
                            <span class="badge bg-light text-dark me-2 mb-2">Larga vida útil</span>
                            <span class="badge bg-light text-dark me-2 mb-2">Certificación internacional</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Producto 2 -->
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="product-card h-100 bg-white rounded shadow overflow-hidden">
                    <div class="product-image position-relative" style="background:#f8f9fa; min-height:220px; display:flex; align-items:center; justify-content:center;">
                        <img src="<?php echo BASE_URL; ?>img/productos/panel%20de%20control%20lavadora.jpg" alt="Panel de control para lavadora" class="img-fluid" style="max-height:180px; object-fit:contain;">
                        <div class="product-overlay d-flex align-items-center justify-content-center" style="opacity:0; transition:opacity .3s; position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,56,179,0.7);">
                            <a href="<?php echo BASE_URL; ?>product-detail.php?id=2" class="btn btn-primary">Ver detalles</a>
                        </div>
                    </div>
                    <div class="product-content p-4">
                        <h4 class="product-title fw-bold mb-2">Panel de control para lavadora</h4>
                        <p class="product-description text-muted mb-2">Panel digital resistente al agua, fácil de usar y con interfaz táctil.</p>
                        <div class="product-features mb-2">
                            <span class="badge bg-light text-dark me-2 mb-2">Interfaz táctil</span>
                            <span class="badge bg-light text-dark me-2 mb-2">Resistente al agua</span>
                            <span class="badge bg-light text-dark me-2 mb-2">Larga vida útil</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Producto 3 -->
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="product-card h-100 bg-white rounded shadow overflow-hidden">
                    <div class="product-image position-relative" style="background:#f8f9fa; min-height:220px; display:flex; align-items:center; justify-content:center;">
                        <img src="<?php echo BASE_URL; ?>img/productos/bomba%20peristaltica.jpg" alt="Bomba peristáltica industrial" class="img-fluid" style="max-height:180px; object-fit:contain;">
                        <div class="product-overlay d-flex align-items-center justify-content-center" style="opacity:0; transition:opacity .3s; position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,56,179,0.7);">
                            <a href="<?php echo BASE_URL; ?>product-detail.php?id=3" class="btn btn-primary">Ver detalles</a>
                        </div>
                    </div>
                    <div class="product-content p-4">
                        <h4 class="product-title fw-bold mb-2">Bomba peristáltica industrial</h4>
                        <p class="product-description text-muted mb-2">Solución robusta para manejo de líquidos en procesos industriales.</p>
                        <div class="product-features mb-2">
                            <span class="badge bg-light text-dark me-2 mb-2">Precisión</span>
                            <span class="badge bg-light text-dark me-2 mb-2">Resistente a la corrosión</span>
                            <span class="badge bg-light text-dark me-2 mb-2">Certificación de seguridad</span>
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
                                <a href="#" class="d-block py-2">Automotriz</a>
                            </li>
                            <li>
                                <a href="#" class="d-block py-2">Electrodomésticos</a>
                            </li>
                            <li>
                                <a href="#" class="d-block py-2">Industrial</a>
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
                    <!-- Producto 4 -->
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="product-card h-100 bg-white rounded shadow overflow-hidden">
                            <div class="product-image position-relative" style="background:#f8f9fa; min-height:220px; display:flex; align-items:center; justify-content:center;">
                                <img src="<?php echo BASE_URL; ?>img/productos/panel%20de%20control%20lavavajillas.jpg" alt="Panel de control para lavavajillas" class="img-fluid" style="max-height:180px; object-fit:contain;">
                                <div class="product-overlay d-flex align-items-center justify-content-center" style="opacity:0; transition:opacity .3s; position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,56,179,0.7);">
                                    <a href="<?php echo BASE_URL; ?>product-detail.php?id=4" class="btn btn-primary">Ver detalles</a>
                                </div>
                            </div>
                            <div class="product-content p-4">
                                <h4 class="product-title fw-bold mb-2">Panel de control para lavavajillas</h4>
                                <p class="product-description text-muted mb-2">Panel resistente y confiable para lavavajillas industriales y domésticos.</p>
                            </div>
                            <div class="product-footer p-4 pt-0 d-flex justify-content-between">
                                <a href="#" class="text-primary"><i class="fas fa-download me-1"></i> Descargar ficha</a>
                                <a href="<?php echo BASE_URL; ?>contact.php?product=4" class="text-primary"><i class="fas fa-envelope me-1"></i> Solicitar cotización</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 5 -->
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-card h-100 bg-white rounded shadow overflow-hidden">
                            <div class="product-image position-relative" style="background:#f8f9fa; min-height:220px; display:flex; align-items:center; justify-content:center;">
                                <img src="<?php echo BASE_URL; ?>img/productos/manija%20del%20refrigerador.jpg" alt="Manija de refrigerador" class="img-fluid" style="max-height:180px; object-fit:contain;">
                                <div class="product-overlay d-flex align-items-center justify-content-center" style="opacity:0; transition:opacity .3s; position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,56,179,0.7);">
                                    <a href="<?php echo BASE_URL; ?>product-detail.php?id=5" class="btn btn-primary">Ver detalles</a>
                                </div>
                            </div>
                            <div class="product-content p-4">
                                <h4 class="product-title fw-bold mb-2">Manija de refrigerador</h4>
                                <p class="product-description text-muted mb-2">Diseño ergonómico y materiales de alta resistencia para uso prolongado.</p>
                            </div>
                            <div class="product-footer p-4 pt-0 d-flex justify-content-between">
                                <a href="#" class="text-primary"><i class="fas fa-download me-1"></i> Descargar ficha</a>
                                <a href="<?php echo BASE_URL; ?>contact.php?product=5" class="text-primary"><i class="fas fa-envelope me-1"></i> Solicitar cotización</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 6 -->
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="product-card h-100 bg-white rounded shadow overflow-hidden">
                            <div class="product-image position-relative" style="background:#f8f9fa; min-height:220px; display:flex; align-items:center; justify-content:center;">
                                <img src="<?php echo BASE_URL; ?>img/productos/rompehielos%20refrigerador.jpg" alt="Rompehielos para refrigerador" class="img-fluid" style="max-height:180px; object-fit:contain;">
                                <div class="product-overlay d-flex align-items-center justify-content-center" style="opacity:0; transition:opacity .3s; position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,56,179,0.7);">
                                    <a href="<?php echo BASE_URL; ?>product-detail.php?id=6" class="btn btn-primary">Ver detalles</a>
                                </div>
                            </div>
                            <div class="product-content p-4">
                                <h4 class="product-title fw-bold mb-2">Rompehielos para refrigerador</h4>
                                <p class="product-description text-muted mb-2">Accesorio esencial para sistemas de refrigeración doméstica y comercial.</p>
                            </div>
                            <div class="product-footer p-4 pt-0 d-flex justify-content-between">
                                <a href="#" class="text-primary"><i class="fas fa-download me-1"></i> Descargar ficha</a>
                                <a href="<?php echo BASE_URL; ?>contact.php?product=6" class="text-primary"><i class="fas fa-envelope me-1"></i> Solicitar cotización</a>
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
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Siguiente</a>
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
                <a href="<?php echo BASE_URL; ?>contact.php" class="btn btn-light btn-lg"><?php echo $products_texts['cta_button']; ?></a>
            </div>
        </div>
    </div>
</section>

<style>
.page-banner .overlay {
    /* Fondo azul eliminado */
    background: none;
}
.product-card {
    transition: box-shadow .3s, transform .3s;
}
.product-card:hover {
    box-shadow: 0 8px 32px rgba(0,56,179,0.15);
    transform: translateY(-6px) scale(1.02);
}
.product-image img {
    transition: transform .3s;
}
.product-card:hover .product-image img {
    transform: scale(1.07);
}
.product-overlay {
    opacity: 0;
    transition: opacity .3s;
}
.product-card:hover .product-overlay {
    opacity: 1 !important;
}
.product-features .badge {
    font-size: 0.95em;
    font-weight: 500;
}
.pagination .page-link {
    color: #0038b3;
    font-weight: 500;
}
.pagination .page-item.active .page-link {
    background: #0038b3;
    color: #fff;
    border-color: #0038b3;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
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
    require_once __DIR__ . '/includes/footer.php';
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
