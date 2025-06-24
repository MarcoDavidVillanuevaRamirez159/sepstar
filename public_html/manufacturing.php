<?php
// Iniciar la captura de buffer para evitar problemas si hay errores
ob_start();

// Definir título y descripción para SEO
$page_title = 'Capacidad de Fabricación';
$page_description = 'Explore las avanzadas capacidades de fabricación de Sepstar México, incluyendo nuestra tecnología de punta, procesos certificados e instalaciones de clase mundial.';
$page_css = 'manufacturing';
$page_js = 'manufacturing';

try {
    // Incluir el archivo de cabecera
    require_once __DIR__ . '/../includes/header.php';

    // Cargar textos específicos de la página
    $manufacturing_texts = load_language_file('manufacturing');

    // Definir breadcrumbs
    $breadcrumbs = [
        '/manufacturing.php' => $manufacturing_texts['page_title']
    ];
} catch (Exception $e) {
    // Si hay un error, mostrarlo en desarrollo
    if (ini_get('display_errors')) {
        echo "<div style='background-color: #ffcccc; border: 1px solid #ff0000; padding: 10px; margin: 10px;'>";
        echo "<strong>Error:</strong> " . $e->getMessage();
        echo "</div>";
    }
    // Registrar el error
    error_log("Error en manufacturing.php: " . $e->getMessage());
}
?>

<!-- Hero Section with Video Background -->
<section class="manufacturing-hero d-flex align-items-center">    <div class="hero-video-wrapper">
        <video class="hero-video" autoplay muted loop playsinline poster="<?php echo BASE_URL; ?>/img/fotos de fabrica y opengraph/fabrica 1.jpg">
            <source src="<?php echo BASE_URL; ?>/img/videos/1a3f4c9bbbb21711704331768906.mp4" type="video/mp4">
        </video>
    </div>
    <div class="container position-relative">
        <div class="row">
            <div class="col-lg-8" data-aos="fade-up">
                <h1 class="display-3 text-white fw-bold mb-4"><?php echo $manufacturing_texts['page_title']; ?></h1>
                <p class="lead text-white mb-5"><?php echo $manufacturing_texts['page_subtitle']; ?></p>
                
                <!-- Stats Counter -->
                <div class="row stats-counter mb-5">
                    <div class="col-6 col-md-3 mb-4 mb-md-0">
                        <div class="stat-item">
                            <span class="stat-value counter" data-target="12000">0</span>
                            <span class="stat-label">m² de fabricación</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 mb-4 mb-md-0">
                        <div class="stat-item">
                            <span class="stat-value counter" data-target="25">0</span>
                            <span class="stat-label">años de experiencia</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-item">
                            <span class="stat-value counter" data-target="15">0</span>
                            <span class="stat-label">máquinas avanzadas</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-item">
                            <span class="stat-value counter" data-prefix="+" data-target="100">0</span>
                            <span class="stat-label">clientes satisfechos</span>
                        </div>
                    </div>
                </div>
                
                <a href="#capabilities" class="btn btn-primary btn-lg px-5 py-3 rounded-pill">
                    Descubrir más <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <div class="mouse"></div>
    </div>
</section>

<!-- Introduction Section -->
<section id="capabilities" class="manufacturing-intro py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right" data-aos-delay="100">
                <h2 class="section-title display-4 fw-bold mb-4"><?php echo $manufacturing_texts['capabilities_title']; ?></h2>
                <p class="section-subtitle lead text-primary mb-4"><?php echo $manufacturing_texts['capabilities_subtitle']; ?></p>
                <p class="lead mb-4"><?php echo $manufacturing_texts['capabilities_desc']; ?></p>
                <div class="d-flex align-items-center">
                    <a href="/contact.php" class="btn btn-outline-primary me-3">
                        Contactar <i class="fas fa-envelope ms-2"></i>
                    </a>
                    <a href="#video-tour" class="video-link d-flex align-items-center text-decoration-none" data-bs-toggle="modal" data-bs-target="#factoryVideoModal">
                        <span class="video-play-small me-3 d-inline-flex align-items-center justify-content-center">
                            <i class="fas fa-play"></i>
                        </span>
                        <span>Ver video de instalaciones</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">                <div class="position-relative factory-video-container rounded-3 overflow-hidden shadow-lg">
                    <img src="<?php echo BASE_URL; ?>/img/fotos de fabrica y opengraph/fabrica 2.jpg" alt="Factory Tour" class="img-fluid">
                    <a href="#" class="video-play-btn" data-bs-toggle="modal" data-bs-target="#factoryVideoModal">
                        <i class="fas fa-play"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technologies Section -->
<section class="technologies-section py-5 bg-light position-relative overflow-hidden">
    <!-- Background Elements -->
    <div class="position-absolute tech-bg-element tech-bg-1"></div>
    <div class="position-absolute tech-bg-element tech-bg-2"></div>
    
    <div class="container py-5">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2 class="section-title display-4 fw-bold mb-3" data-aos="fade-up"><?php echo $manufacturing_texts['technologies_title']; ?></h2>
                <p class="lead text-secondary mb-0" data-aos="fade-up" data-aos-delay="100">Nuestras soluciones tecnológicas avanzadas que marcan la diferencia</p>
            </div>
        </div>
        
        <div class="row">
            <!-- Technology 1 -->
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="tech-card h-100 rounded-3 p-4 text-center">
                    <div class="tech-icon mx-auto">
                        <i class="fas fa-cogs fa-2x"></i>
                    </div>
                    <h4 class="tech-title mt-4"><?php echo $manufacturing_texts['tech1_title']; ?></h4>
                    <p class="tech-desc mb-3"><?php echo $manufacturing_texts['tech1_desc']; ?></p>
                    <a href="#" class="tech-link text-primary d-inline-flex align-items-center" 
                       data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ver más detalles">
                       <span>Saber más</span>
                       <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            
            <!-- Technology 2 -->
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="tech-card h-100 rounded-3 p-4 text-center">
                    <div class="tech-icon mx-auto">
                        <i class="fas fa-hammer fa-2x"></i>
                    </div>
                    <h4 class="tech-title mt-4"><?php echo $manufacturing_texts['tech2_title']; ?></h4>
                    <p class="tech-desc mb-3"><?php echo $manufacturing_texts['tech2_desc']; ?></p>
                    <a href="#" class="tech-link text-primary d-inline-flex align-items-center"
                       data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ver más detalles">
                       <span>Saber más</span>
                       <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            
            <!-- Technology 3 -->
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="tech-card h-100 rounded-3 p-4 text-center">
                    <div class="tech-icon mx-auto">
                        <i class="fas fa-robot fa-2x"></i>
                    </div>
                    <h4 class="tech-title mt-4"><?php echo $manufacturing_texts['tech3_title']; ?></h4>
                    <p class="tech-desc mb-3"><?php echo $manufacturing_texts['tech3_desc']; ?></p>
                    <a href="#" class="tech-link text-primary d-inline-flex align-items-center"
                       data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ver más detalles">
                       <span>Saber más</span>
                       <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            
            <!-- Technology 4 -->
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="tech-card h-100 rounded-3 p-4 text-center">
                    <div class="tech-icon mx-auto">
                        <i class="fas fa-wrench fa-2x"></i>
                    </div>
                    <h4 class="tech-title mt-4"><?php echo $manufacturing_texts['tech4_title']; ?></h4>
                    <p class="tech-desc mb-3"><?php echo $manufacturing_texts['tech4_desc']; ?></p>
                    <a href="#" class="tech-link text-primary d-inline-flex align-items-center"
                       data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ver más detalles">
                       <span>Saber más</span>
                       <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Tech Showcase -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="tech-showcase p-5 bg-white rounded-3 shadow-lg" data-aos="fade-up">
                    <div class="row align-items-center">
                        <div class="col-lg-5 mb-4 mb-lg-0">
                            <h3 class="mb-4">Tecnología de Punta</h3>
                            <p class="lead mb-4">Nuestra inversión constante en tecnología garantiza productos de la más alta calidad y precisión.</p>
                            <ul class="list-unstyled">
                                <li class="d-flex align-items-center mb-3">
                                    <div class="check-icon me-3 d-flex align-items-center justify-content-center bg-primary text-white rounded-circle">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <span>Maquinaria de última generación</span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <div class="check-icon me-3 d-flex align-items-center justify-content-center bg-primary text-white rounded-circle">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <span>Procesos automatizados de alta precisión</span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <div class="check-icon me-3 d-flex align-items-center justify-content-center bg-primary text-white rounded-circle">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <span>Control de calidad computarizado</span>
                                </li>
                            </ul>
                            <a href="/contact.php" class="btn btn-primary mt-3">Solicitar información</a>
                        </div>
                        <div class="col-lg-7">
                            <div class="tech-showcase-slider">
                                <div class="tech-image-container rounded-3 overflow-hidden">
                                    <img src="<?php echo BASE_URL; ?>/img/equipo de trabajo o manufactura/fabricacion.jpg" alt="Tecnología de fabricación" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Manufacturing Process Section -->
<section class="process-section py-5">
    <div class="container py-5">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <span class="badge bg-primary text-white px-3 py-2 mb-3" data-aos="fade-up">Proceso Optimizado</span>
                <h2 class="section-title display-4 fw-bold mb-4" data-aos="fade-up" data-aos-delay="100"><?php echo $manufacturing_texts['processes_title']; ?></h2>
                <p class="lead mb-0" data-aos="fade-up" data-aos-delay="200">De la idea al producto final con los más altos estándares de calidad</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="process-timeline">
                    <!-- Process Item 1 -->
                    <div class="process-item">
                        <div class="process-dot"></div>
                        <div class="process-content">
                            <div class="process-icon mb-4 d-inline-flex align-items-center justify-content-center rounded-circle bg-primary text-white">
                                <i class="fas fa-lightbulb fa-2x"></i>
                            </div>
                            <span class="process-number">01</span>
                            <h4><?php echo $manufacturing_texts['process1_title']; ?></h4>
                            <p><?php echo $manufacturing_texts['process1_desc']; ?></p>
                            <a href="#" class="btn btn-sm btn-outline-primary mt-2" data-bs-toggle="tooltip" title="Ver detalles de esta fase">Más información</a>
                        </div>
                    </div>
                    
                    <!-- Process Item 2 -->
                    <div class="process-item">
                        <div class="process-dot"></div>
                        <div class="process-content">
                            <div class="process-icon mb-4 d-inline-flex align-items-center justify-content-center rounded-circle bg-primary text-white">
                                <i class="fas fa-drafting-compass fa-2x"></i>
                            </div>
                            <span class="process-number">02</span>
                            <h4><?php echo $manufacturing_texts['process2_title']; ?></h4>
                            <p><?php echo $manufacturing_texts['process2_desc']; ?></p>
                            <a href="#" class="btn btn-sm btn-outline-primary mt-2" data-bs-toggle="tooltip" title="Ver detalles de esta fase">Más información</a>
                        </div>
                    </div>
                    
                    <!-- Process Item 3 -->
                    <div class="process-item">
                        <div class="process-dot"></div>
                        <div class="process-content">
                            <div class="process-icon mb-4 d-inline-flex align-items-center justify-content-center rounded-circle bg-primary text-white">
                                <i class="fas fa-cogs fa-2x"></i>
                            </div>
                            <span class="process-number">03</span>
                            <h4><?php echo $manufacturing_texts['process3_title']; ?></h4>
                            <p><?php echo $manufacturing_texts['process3_desc']; ?></p>
                            <a href="#" class="btn btn-sm btn-outline-primary mt-2" data-bs-toggle="tooltip" title="Ver detalles de esta fase">Más información</a>
                        </div>
                    </div>
                    
                    <!-- Process Item 4 -->
                    <div class="process-item">
                        <div class="process-dot"></div>
                        <div class="process-content">
                            <div class="process-icon mb-4 d-inline-flex align-items-center justify-content-center rounded-circle bg-primary text-white">
                                <i class="fas fa-box-open fa-2x"></i>
                            </div>
                            <span class="process-number">04</span>
                            <h4><?php echo $manufacturing_texts['process4_title']; ?></h4>
                            <p><?php echo $manufacturing_texts['process4_desc']; ?></p>
                            <a href="#" class="btn btn-sm btn-outline-primary mt-2" data-bs-toggle="tooltip" title="Ver detalles de esta fase">Más información</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Process Visualization -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="process-visualization bg-white p-4 rounded-3 shadow-lg" data-aos="fade-up">
                    <div class="row align-items-center">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <div class="interactive-process position-relative">
                                <img src="<?php echo BASE_URL; ?>/img/equipo de trabajo o manufactura/equipo de trabajo 2.jpg" alt="Proceso de fabricación" class="img-fluid rounded-3">
                                <div class="process-hotspot hotspot-1" data-bs-toggle="tooltip" title="Diseño y planificación">
                                    <span class="hotspot-dot"></span>
                                </div>
                                <div class="process-hotspot hotspot-2" data-bs-toggle="tooltip" title="Moldeo y producción">
                                    <span class="hotspot-dot"></span>
                                </div>
                                <div class="process-hotspot hotspot-3" data-bs-toggle="tooltip" title="Control de calidad">
                                    <span class="hotspot-dot"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h3 class="mb-4">Excelencia en cada paso</h3>
                            <p class="lead mb-4">Nuestro proceso de fabricación está diseñado para garantizar la máxima calidad, eficiencia y precisión en cada etapa.</p>
                            <div class="process-features">
                                <div class="d-flex mb-3">
                                    <div class="process-feature-icon me-3 d-flex align-items-start justify-content-center">
                                        <i class="fas fa-check-circle text-primary fa-2x"></i>
                                    </div>
                                    <div>
                                        <h5>Control de calidad riguroso</h5>
                                        <p class="mb-0">Múltiples puntos de control durante todo el proceso de producción</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="process-feature-icon me-3 d-flex align-items-start justify-content-center">
                                        <i class="fas fa-check-circle text-primary fa-2x"></i>
                                    </div>
                                    <div>
                                        <h5>Producción optimizada</h5>
                                        <p class="mb-0">Sistemas avanzados para maximizar eficiencia y minimizar desperdicios</p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="process-feature-icon me-3 d-flex align-items-start justify-content-center">
                                        <i class="fas fa-check-circle text-primary fa-2x"></i>
                                    </div>
                                    <div>
                                        <h5>Mejora continua</h5>
                                        <p class="mb-0">Análisis y optimización constante de nuestros procesos</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Facilities Section -->
<section class="facilities-section py-5 bg-light position-relative">
    <!-- Background Pattern -->
    <div class="position-absolute facilities-pattern"></div>
    
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-lg-8" data-aos="fade-up">
                <span class="badge bg-primary text-white px-3 py-2 mb-3">Instalaciones de Clase Mundial</span>
                <h2 class="section-title display-4 fw-bold mb-4"><?php echo $manufacturing_texts['facilities_title']; ?></h2>
                <p class="section-subtitle lead text-primary mb-3"><?php echo $manufacturing_texts['facilities_subtitle']; ?></p>
                <p class="lead"><?php echo $manufacturing_texts['facilities_desc']; ?></p>
            </div>
        </div>
        
        <!-- Facility Key Features -->
        <div class="row mb-5">
            <div class="col-md-4 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                <div class="facility-feature p-4 bg-white rounded-3 shadow h-100">
                    <div class="facility-feature-icon mb-4">
                        <i class="fas fa-industry fa-3x text-primary"></i>
                    </div>
                    <h4>Planta de Producción Moderna</h4>
                    <p class="mb-0">Nuestras instalaciones de última generación cuentan con más de 9,000 m² dedicados a la producción de alta calidad.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="200">
                <div class="facility-feature p-4 bg-white rounded-3 shadow h-100">
                    <div class="facility-feature-icon mb-4">
                        <i class="fas fa-map-marker-alt fa-3x text-primary"></i>
                    </div>
                    <h4>Ubicación Estratégica</h4>
                    <p class="mb-0">Situados en una ubicación estratégica en Monterrey, facilitando la distribución eficiente hacia toda América del Norte.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="facility-feature p-4 bg-white rounded-3 shadow h-100">
                    <div class="facility-feature-icon mb-4">
                        <i class="fas fa-cog fa-3x text-primary"></i>
                    </div>
                    <h4>Equipamiento Avanzado</h4>
                    <p class="mb-0">Contamos con 12 máquinas de moldeo por inyección y tres líneas de producción de ensamblaje totalmente automáticas.</p>
                </div>
            </div>
        </div>
        
        <!-- Gallery -->
        <div class="row mt-5" data-aos="fade-up" data-aos-delay="200">
            <div class="col-12 mb-5 text-center">
                <h3 class="mb-4">Nuestras Instalaciones</h3>
                <p class="mb-5">Explore nuestras modernas instalaciones de producción</p>
            </div>
              <div class="col-md-6 col-lg-4 mb-4">
                <div class="facility-gallery-item">
                    <img src="<?php echo BASE_URL; ?>/img/fotos de fabrica y opengraph/fabrica 1.jpg" alt="Instalaciones Sepstar" class="img-fluid rounded-3 shadow">
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="facility-gallery-item">
                    <img src="<?php echo BASE_URL; ?>/img/fotos de fabrica y opengraph/fabrica 2.jpg" alt="Instalaciones Sepstar" class="img-fluid rounded-3 shadow">
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="facility-gallery-item">
                    <img src="<?php echo BASE_URL; ?>/img/fotos de fabrica y opengraph/fabrica 3.jpg" alt="Instalaciones Sepstar" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
        
        <!-- Facility Map -->
        <div class="row mt-5" data-aos="fade-up">
            <div class="col-12">
                <div class="facilities-map rounded-3 shadow">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3596.9052137781253!2d-100.1817498!3d25.668219800000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8662c10049490ebf%3A0xc350267f326af457!2sSepstar%20Mexico%20S%20DE%20RL%20DE%20CV!5e0!3m2!1sen!2smx!4v1624467456144!5m2!1sen!2smx" 
                        width="100%" 
                        height="400" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Certifications Section -->
<section class="certifications-section py-5">
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
                <span class="badge bg-primary text-white px-3 py-2 mb-3">Garantía de Calidad</span>
                <h2 class="section-title display-4 fw-bold mb-4"><?php echo $manufacturing_texts['certifications_title']; ?></h2>
                <p class="lead"><?php echo $manufacturing_texts['certifications_desc']; ?></p>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">                <div class="certification-item text-center h-100 p-4 bg-white rounded-3 shadow">
                    <div class="cert-icon-wrap mb-4 mx-auto d-flex align-items-center justify-content-center">
                        <img src="<?php echo BASE_URL; ?>/img/certificados/certificado de wuhu sepstar iatf16949.jpg" alt="Certificado IATF 16949 - Wuhu Sepstar" class="certification-logo">
                    </div>                    <h5 class="mb-3">Certificado IATF 16949 - Wuhu Sepstar</h5>
                    <p class="cert-desc mb-0 text-muted small">Certificación internacional específica para la industria automotriz</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">                <div class="certification-item text-center h-100 p-4 bg-white rounded-3 shadow">
                    <div class="cert-icon-wrap mb-4 mx-auto d-flex align-items-center justify-content-center">
                        <img src="<?php echo BASE_URL; ?>/img/certificados/certificado nacional de la empreasa cientifica.png" alt="Certificado Nacional de Empresa Científica" class="certification-logo">
                    </div>                    <h5 class="mb-3">Certificado Nacional de Empresa Científica</h5>
                    <p class="cert-desc mb-0 text-muted small">Reconocimiento nacional por innovación y desarrollo científico</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">                <div class="certification-item text-center h-100 p-4 bg-white rounded-3 shadow">
                    <div class="cert-icon-wrap mb-4 mx-auto d-flex align-items-center justify-content-center">
                        <img src="<?php echo BASE_URL; ?>/img/certificados/certificado zhuhai iatf16949.jpg" alt="Certificado IATF 16949 - Zhuhai Sepstar" class="certification-logo">
                    </div>                    <h5 class="mb-3">Certificado IATF 16949 - Zhuhai Sepstar</h5>
                    <p class="cert-desc mb-0 text-muted small">Certificación internacional específica para la industria automotriz</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="400">                <div class="certification-item text-center h-100 p-4 bg-white rounded-3 shadow">
                    <div class="cert-icon-wrap mb-4 mx-auto d-flex align-items-center justify-content-center">
                        <img src="<?php echo BASE_URL; ?>/img/certificados/medium enterprises certificate.jpg" alt="Certificado de Empresa de Mediana Escala" class="certification-logo">
                    </div>                    <h5 class="mb-3">Certificado de Empresa de Mediana Escala</h5>
                    <p class="cert-desc mb-0 text-muted small">Reconocimiento oficial como empresa de mediana escala de alta calidad</p>
                </div>
            </div>
        </div>
        
        <!-- Certification Banner -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="certification-banner p-5 bg-white rounded-3 shadow position-relative overflow-hidden" data-aos="fade-up">
                    <div class="row align-items-center">
                        <div class="col-lg-7 position-relative z-index-1">
                            <h3 class="display-6 mb-4">Comprometidos con la excelencia y calidad</h3>
                            <p class="lead mb-4">Nuestras certificaciones respaldan nuestro compromiso con los más altos estándares en procesos de fabricación.</p>                            <div class="d-flex flex-wrap cert-banner-logos">                                <img src="<?php echo BASE_URL; ?>/img/certificados/certificado de empresa de alta tecnologia.jpg" alt="Certificado de Empresa de Alta Tecnología" class="me-4 mb-3 cert-banner-logo">
                                <img src="<?php echo BASE_URL; ?>/img/certificados/certificado de empresa de alta tecnologia2.jpg" alt="Certificado de Empresa de Alta Tecnología 2" class="me-4 mb-3 cert-banner-logo">
                                <img src="<?php echo BASE_URL; ?>/img/certificados/certificado nacional de la empreasa cientifica.png" alt="Certificado Nacional de Empresa Científica" class="me-4 mb-3 cert-banner-logo">
                            </div>
                        </div>
                        <div class="col-lg-5 d-none d-lg-block">
                            <div class="cert-banner-image">
                                <img src="<?php echo BASE_URL; ?>/img/equipo de trabajo o manufactura/equipo de trabajo 1.jpg" alt="Equipo de trabajo" class="img-fluid rounded-3">
                            </div>
                        </div>
                    </div>
                    <!-- Background element -->
                    <div class="cert-banner-bg"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta-section py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="cta-content p-5 rounded-3 position-relative overflow-hidden">
                    <div class="row align-items-center position-relative z-index-1">
                        <div class="col-lg-8 mb-4 mb-lg-0" data-aos="fade-right">
                            <h2 class="display-5 fw-bold text-white mb-3"><?php echo $manufacturing_texts['cta_title']; ?></h2>
                            <p class="lead text-white mb-0 opacity-90"><?php echo $manufacturing_texts['cta_text']; ?></p>
                        </div>
                        <div class="col-lg-4 text-center text-lg-end" data-aos="fade-left">
                            <a href="/contact.php" class="cta-btn btn btn-light btn-lg px-5 py-3">
                                <?php echo $manufacturing_texts['cta_button']; ?> <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Factory Video Modal -->
<div class="modal fade" id="factoryVideoModal" tabindex="-1" aria-labelledby="factoryVideoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold" id="factoryVideoModalLabel">Recorrido por la Fábrica Sepstar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>                <div class="modal-body p-0">
                <div class="ratio ratio-16x9">
                    <iframe src="about:blank" id="factoryVideoFrame" allowfullscreen data-video-url="https://www.youtube.com/embed/ZK0OQk_vShg" title="Factory Tour"></iframe>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <div class="d-flex align-items-center text-muted">
                    <i class="fas fa-info-circle me-2"></i> 
                    <small>Explore nuestras instalaciones y procesos de fabricación en este recorrido virtual</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Lightbox CSS -->
<style>
.lightbox-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.9);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    padding: 2rem;
}

.lightbox-container {
    position: relative;
    max-width: 90%;
    max-height: 90%;
    transform: scale(0.9);
    transition: transform 0.3s ease;
}

.lightbox-image {
    max-width: 100%;
    max-height: 85vh;
    border-radius: 5px;
    box-shadow: 0 5px 30px rgba(0,0,0,0.3);
}

.lightbox-close {
    position: absolute;
    top: -20px;
    right: -20px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: white;
    border: none;
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 2px 10px rgba(0,0,0,0.2);
}

/* Process Hotspots */
.interactive-process {
    position: relative;
}

.process-hotspot {
    position: absolute;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: rgba(var(--bs-primary-rgb), 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    animation: pulse 1.5s infinite;
}

.hotspot-1 {
    top: 25%;
    left: 20%;
}

.hotspot-2 {
    top: 45%;
    left: 60%;
}

.hotspot-3 {
    top: 70%;
    left: 40%;
}

.hotspot-dot {
    width: 12px;
    height: 12px;
    background: var(--bs-primary);
    border-radius: 50%;
}

@keyframes pulse {
    0% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(var(--bs-primary-rgb), 0.4);
    }
    70% {
        transform: scale(1.1);
        box-shadow: 0 0 0 15px rgba(var(--bs-primary-rgb), 0);
    }
    100% {
        transform: scale(1);
    }
}

/* Additional Styles */
.process-number {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 3rem;
    font-weight: 700;
    color: rgba(var(--bs-primary-rgb), 0.1);
    z-index: 0;
}

.process-icon {
    width: 60px;
    height: 60px;
    font-size: 1.5rem;
}

.check-icon {
    width: 24px;
    height: 24px;
    font-size: 0.8rem;
}

.cert-icon-wrap {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 2px solid #f2f2f2;
    overflow: hidden;
    background: white;
    transition: all 0.4s ease;
}

.cert-banner-logo {
    height: 60px;
    width: auto;
}

.cert-banner-image {
    position: relative;
    z-index: 1;
}

.cert-banner-bg {
    position: absolute;
    top: 0;
    right: 0;
    width: 50%;
    height: 100%;
    background: rgba(var(--bs-primary-rgb), 0.05);
    clip-path: polygon(20% 0, 100% 0, 100% 100%, 0% 100%);
}

.video-play-small {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--bs-primary);
    color: white;
    font-size: 0.8rem;
    transition: all 0.3s ease;
}

.video-link {
    color: #333;
    transition: all 0.3s ease;
}

.video-link:hover {
    color: var(--bs-primary);
}

.video-link:hover .video-play-small {
    transform: scale(1.1);
}

.tech-bg-element {
    width: 300px;
    height: 300px;
    background: rgba(var(--bs-primary-rgb), 0.05);
    border-radius: 50%;
    z-index: 0;
}

.tech-bg-1 {
    top: -100px;
    left: -100px;
}

.tech-bg-2 {
    bottom: -100px;
    right: -100px;
}

.z-index-1 {
    position: relative;
    z-index: 1;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll para enlaces internos
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            if(this.getAttribute('href').length > 1) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
    
    // Inicializar tooltips de Bootstrap
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl, {
            boundary: document.body
        });
    });
    
    // Contador dinámico para estadísticas
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -10% 0px'
    };
    
    // Observador para elementos de proceso
    const processObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                const dot = entry.target.querySelector('.process-dot');
                if (dot) setTimeout(() => dot.classList.add('active'), 300);
                processObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.process-item').forEach(item => {
        processObserver.observe(item);
    });
    
    // Evento para animación de parallax en scroll
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Aplicar parallax en elementos con clase parallax
        document.querySelectorAll('.parallax').forEach(element => {
            const speed = element.dataset.speed || 0.3;
            element.style.transform = `translateY(${scrollTop * speed}px)`;
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
    error_log("Error al cargar el pie de página en manufacturing.php: " . $e->getMessage());
}

// Finalizar la captura de buffer
$output = ob_get_clean();
echo $output;
?>
