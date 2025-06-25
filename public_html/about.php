<?php
// Iniciar la captura de buffer para evitar problemas si hay errores
ob_start();

// Definir título y descripción para SEO
$page_title = 'Sobre Nosotros';
$page_description = 'Conozca a Sepstar México, fabricante líder de componentes OEM y ODM para las industrias automotriz y de electrodomésticos en América del Norte.';
$page_css = 'about';
$page_js = 'about';

try {
    // Incluir el archivo de cabecera
    require_once __DIR__ . '/../includes/header.php';

// Cargar textos específicos de la página
$about_texts = load_language_file('about');

// Definir breadcrumbs
$breadcrumbs = [
    '/about.php' => $about_texts['page_title']
];
} catch (Exception $e) {
    // Si hay un error, mostrarlo en desarrollo
    if (ini_get('display_errors')) {
        echo "<div style='background-color: #ffcccc; border: 1px solid #ff0000; padding: 10px; margin: 10px;'>";
        echo "<strong>Error:</strong> " . $e->getMessage();
        echo "</div>";
    }
    // Registrar el error
    error_log("Error en about.php: " . $e->getMessage());
}
?>

<!-- Page Banner -->
<section class="page-banner" style="background-image: url('<?php echo BASE_URL; ?>/img/fotos de fabrica y opengraph/fabrica 1.jpg');">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-6">
                <div class="page-banner-content" data-aos="fade-right">
                    <h1 class="page-banner-title"><?php echo $about_texts['page_title']; ?></h1>
                    <p class="page-banner-subtitle"><?php echo $about_texts['page_subtitle']; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Company Section -->
<section class="about-company py-5">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                <div class="about-image position-relative">
                    <img src="<?php echo BASE_URL; ?>/img/fotos de fabrica y opengraph/fabrica 1.jpg" alt="Fábrica Sepstar" class="img-fluid rounded shadow">
                    <div class="about-experience">
                        <span>10+</span>
                        <span><?php echo $about_texts['years_exp']; ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="about-content">
                    <div class="section-title text-start">
                        <h2><?php echo $about_texts['company_title']; ?></h2>
                    </div>
                    <p><?php echo $about_texts['company_desc_1']; ?></p>
                    <p><?php echo $about_texts['company_desc_2']; ?></p>
                    <p><?php echo $about_texts['company_desc_3']; ?></p>
                    
                    <div class="row mt-4">
                        <div class="col-sm-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="about-icon me-3">
                                    <i class="fas fa-check-circle text-primary fa-2x"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1"><?php echo $about_texts['feature_1']; ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="about-icon me-3">
                                    <i class="fas fa-check-circle text-primary fa-2x"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1"><?php echo $about_texts['feature_2']; ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="about-icon me-3">
                                    <i class="fas fa-check-circle text-primary fa-2x"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1"><?php echo $about_texts['feature_3']; ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="about-icon me-3">
                                    <i class="fas fa-check-circle text-primary fa-2x"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1"><?php echo $about_texts['feature_4']; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission Vision Values Section -->
<section class="mission-vision py-5 bg-light">
    <div class="container py-4">
        <div class="section-title mb-5" data-aos="fade-up">
            <h2><?php echo $about_texts['mvv_title']; ?></h2>
        </div>
        
        <div class="row">
            <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                <div class="mvv-card text-center h-100">
                    <div class="mvv-icon mb-4">
                        <i class="fas fa-bullseye fa-3x text-primary"></i>
                    </div>
                    <h3 class="mvv-title"><?php echo $about_texts['mission_title']; ?></h3>
                    <p class="mvv-desc"><?php echo $about_texts['mission_desc']; ?></p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                <div class="mvv-card text-center h-100">
                    <div class="mvv-icon mb-4">
                        <i class="fas fa-eye fa-3x text-primary"></i>
                    </div>
                    <h3 class="mvv-title"><?php echo $about_texts['vision_title']; ?></h3>
                    <p class="mvv-desc"><?php echo $about_texts['vision_desc']; ?></p>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="mvv-card text-center h-100">
                    <div class="mvv-icon mb-4">
                        <i class="fas fa-hands-helping fa-3x text-primary"></i>
                    </div>
                    <h3 class="mvv-title"><?php echo $about_texts['values_title']; ?></h3>
                    <p class="mvv-desc"><?php echo $about_texts['values_desc']; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- History Timeline Section -->
<section class="history-section py-5">
    <div class="container py-4">
        <div class="section-title mb-5" data-aos="fade-up">
            <h2><?php echo $about_texts['history_title']; ?></h2>
        </div>
        
        <div class="timeline" data-aos="fade-up">
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
                <div class="timeline-dot"></div>
                <div class="timeline-date"><?php echo $about_texts['history_year_1']; ?></div>
                <div class="timeline-content">
                    <h3><?php echo $about_texts['history_event_1']; ?></h3>
                    <p><?php echo $about_texts['history_desc_1']; ?></p>
                </div>
            </div>
            
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="200">
                <div class="timeline-dot"></div>
                <div class="timeline-date"><?php echo $about_texts['history_year_2']; ?></div>
                <div class="timeline-content">
                    <h3><?php echo $about_texts['history_event_2']; ?></h3>
                    <p><?php echo $about_texts['history_desc_2']; ?></p>
                </div>
            </div>
            
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="300">
                <div class="timeline-dot"></div>
                <div class="timeline-date"><?php echo $about_texts['history_year_3']; ?></div>
                <div class="timeline-content">
                    <h3><?php echo $about_texts['history_event_3']; ?></h3>
                    <p><?php echo $about_texts['history_desc_3']; ?></p>
                </div>
            </div>
            
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="400">
                <div class="timeline-dot"></div>
                <div class="timeline-date"><?php echo $about_texts['history_year_4']; ?></div>
                <div class="timeline-content">
                    <h3><?php echo $about_texts['history_event_4']; ?></h3>
                    <p><?php echo $about_texts['history_desc_4']; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section py-5 bg-light">
    <div class="container py-4">
        <div class="section-title mb-5" data-aos="fade-up">
            <h2><?php echo $about_texts['team_title']; ?></h2>
        </div>
        <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
            <?php echo $about_texts['team_subtitle']; ?>
        </p>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="team-card text-center">
                    <div class="team-image d-flex justify-content-center align-items-center" style="height: 120px;">
                        <i class="fas fa-user-tie fa-5x text-primary"></i>
                        <div class="team-social d-none"></div>
                    </div>
                    <div class="team-content">
                        <h3><?php echo $about_texts['team_member_1_name']; ?></h3>
                        <div class="team-position"><?php echo $about_texts['team_member_1_position']; ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="team-card text-center">
                    <div class="team-image d-flex justify-content-center align-items-center" style="height: 120px;">
                        <i class="fas fa-user-tie fa-5x text-primary"></i>
                        <div class="team-social d-none"></div>
                    </div>
                    <div class="team-content">
                        <h3><?php echo $about_texts['team_member_2_name']; ?></h3>
                        <div class="team-position"><?php echo $about_texts['team_member_2_position']; ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="team-card text-center">
                    <div class="team-image d-flex justify-content-center align-items-center" style="height: 120px;">
                        <i class="fas fa-user-tie fa-5x text-primary"></i>
                        <div class="team-social d-none"></div>
                    </div>
                    <div class="team-content">
                        <h3><?php echo $about_texts['team_member_3_name']; ?></h3>
                        <div class="team-position"><?php echo $about_texts['team_member_3_position']; ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="team-card text-center">
                    <div class="team-image d-flex justify-content-center align-items-center" style="height: 120px;">
                        <i class="fas fa-user-tie fa-5x text-primary"></i>
                        <div class="team-social d-none"></div>
                    </div>
                    <div class="team-content">
                        <h3><?php echo $about_texts['team_member_4_name']; ?></h3>
                        <div class="team-position"><?php echo $about_texts['team_member_4_position']; ?></div>
                    </div>
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
                <h2 class="section-title display-4 fw-bold mb-4"><?php echo $about_texts['certifications_title']; ?></h2>
                <p class="lead"><?php echo $about_texts['certifications_subtitle']; ?></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="certification-item text-center h-100 p-4 bg-white rounded-3 shadow">
                    <div class="cert-icon-wrap mb-4 mx-auto d-flex align-items-center justify-content-center">
                        <img src="<?php echo BASE_URL; ?>/img/certificados/certificado de wuhu sepstar iatf16949.jpg" alt="Certificado IATF 16949 - Wuhu Sepstar" class="certification-logo">
                    </div>
                    <h5 class="mb-3">Certificado IATF 16949 - Wuhu Sepstar</h5>
                    <p class="cert-desc mb-0 text-muted small">Certificación internacional específica para la industria automotriz</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="certification-item text-center h-100 p-4 bg-white rounded-3 shadow">
                    <div class="cert-icon-wrap mb-4 mx-auto d-flex align-items-center justify-content-center">
                        <img src="<?php echo BASE_URL; ?>/img/certificados/certificado nacional de la empreasa cientifica.png" alt="Certificado Nacional de Empresa Científica" class="certification-logo">
                    </div>
                    <h5 class="mb-3">Certificado Nacional de Empresa Científica</h5>
                    <p class="cert-desc mb-0 text-muted small">Reconocimiento nacional por innovación y desarrollo científico</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="certification-item text-center h-100 p-4 bg-white rounded-3 shadow">
                    <div class="cert-icon-wrap mb-4 mx-auto d-flex align-items-center justify-content-center">
                        <img src="<?php echo BASE_URL; ?>/img/certificados/certificado zhuhai iatf16949.jpg" alt="Certificado IATF 16949 - Zhuhai Sepstar" class="certification-logo">
                    </div>
                    <h5 class="mb-3">Certificado IATF 16949 - Zhuhai Sepstar</h5>
                    <p class="cert-desc mb-0 text-muted small">Certificación internacional específica para la industria automotriz</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="certification-item text-center h-100 p-4 bg-white rounded-3 shadow">
                    <div class="cert-icon-wrap mb-4 mx-auto d-flex align-items-center justify-content-center">
                        <img src="<?php echo BASE_URL; ?>/img/certificados/medium enterprises certificate.jpg" alt="Certificado de Empresa de Mediana Escala" class="certification-logo">
                    </div>
                    <h5 class="mb-3">Certificado de Empresa de Mediana Escala</h5>
                    <p class="cert-desc mb-0 text-muted small">Reconocimiento oficial como empresa de mediana escala de alta calidad</p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="certification-banner p-5 bg-white rounded-3 shadow position-relative overflow-hidden" data-aos="fade-up">
                    <div class="row align-items-center">
                        <div class="col-lg-7 position-relative z-index-1">
                            <h3 class="display-6 mb-4">Comprometidos con la excelencia y calidad</h3>
                            <p class="lead mb-4">Nuestras certificaciones respaldan nuestro compromiso con los más altos estándares en procesos de fabricación.</p>
                            <div class="d-flex flex-wrap cert-banner-logos">
                                <img src="<?php echo BASE_URL; ?>/img/certificados/certificado de empresa de alta tecnologia.jpg" alt="Certificado de Empresa de Alta Tecnología" class="me-4 mb-3 cert-banner-logo">
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
                    <div class="cert-banner-bg"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section py-5" style="background-image: url('/img/cta-bg-2.jpg'); background-size: cover; background-position: center; position: relative;">
    <div class="overlay" style="background-color: rgba(0,56,179,0.85); position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></div>
    <div class="container py-5 position-relative">
        <div class="row align-items-center">
            <div class="col-lg-8 text-white mb-4 mb-lg-0" data-aos="fade-up">
                <h2 class="mb-3"><?php echo $about_texts['cta_title']; ?></h2>
                <p class="mb-0"><?php echo $about_texts['cta_text']; ?></p>
            </div>
            <div class="col-lg-4 text-lg-end" data-aos="fade-up" data-aos-delay="100">
                <a href="/contact.php" class="btn btn-light btn-lg"><?php echo $about_texts['cta_button']; ?></a>
            </div>
        </div>
    </div>
</section>

<!-- CSS específico para la página de About -->
<style>
    .page-banner {
        height: 400px;
        background-size: cover;
        background-position: center;
        position: relative;
        color: #fff;
    }
    
    .page-banner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.6);
    }
    
    .page-banner-content {
        position: relative;
        z-index: 1;
        padding: 2rem 0;
    }
    
    .page-banner-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }
    
    .page-banner-subtitle {
        font-size: 1.2rem;
        max-width: 600px;
    }
    
    .mvv-card {
        background-color: #fff;
        border-radius: 8px;
        padding: 2rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        height: 100%;
        padding-top: 2.5rem;
    }
    
    .mvv-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .mvv-icon {
        width: 80px;
        height: 80px;
        line-height: 80px;
        text-align: center;
        border-radius: 50%;
        background-color: rgba(0,86,179,0.1);
        margin: 0 auto 1rem auto;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
    }
    
    .mvv-title {
        margin-bottom: 1rem;
        font-size: 1.5rem;
        text-align: center;
    }
    
    .mvv-desc {
        text-align: center;
    }
    
    .timeline {
        position: relative;
        padding: 0;
        list-style: none;
        max-width: 1000px;
        margin: 0 auto;
    }
    
    .timeline::before {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        left: 50%;
        width: 3px;
        margin-left: -1.5px;
        background-color: #e9ecef;
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 50px;
        padding: 0 50px;
    }
    
    .timeline-item:last-child {
        margin-bottom: 0;
    }
    
    .timeline-dot {
        position: absolute;
        top: 8px;
        left: 50%;
        width: 16px;
        height: 16px;
        margin-left: -8px;
        border-radius: 50%;
        background-color: var(--primary-color);
        z-index: 1;
    }
    
    .timeline-date {
        position: absolute;
        top: 0;
        left: 0;
        width: 40%;
        padding-right: 30px;
        text-align: right;
        font-weight: 700;
        color: var(--primary-color);
    }
    
    .timeline-content {
        width: 40%;
        margin-left: 60%;
        padding: 0 30px;
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .timeline-content h3 {
        margin-bottom: 10px;
        font-size: 1.25rem;
    }
    
    @media (max-width: 767.98px) {
        .timeline::before {
            left: 40px;
        }
        
        .timeline-item {
            padding-left: 90px;
            padding-right: 0;
        }
        
        .timeline-dot {
            left: 40px;
        }
        
        .timeline-date {
            width: auto;
            left: 0;
            top: -30px;
            text-align: left;
            padding: 0;
        }
        
        .timeline-content {
            width: 100%;
            margin-left: 0;
            padding: 15px;
        }
    }
    
    .certification-card {
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .certification-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .certification-image {
        padding: 2rem;
        text-align: center;
        background-color: #f8f9fa;
    }
    
    .certification-image img {
        max-height: 150px;
    }
    
    .certification-content {
        padding: 1.5rem;
    }
    
    .certification-content h3 {
        font-size: 1.25rem;
        margin-bottom: 1rem;
    }
    
    .certification-logo {
        max-width: 120px;
        max-height: 90px;
        width: auto;
        height: auto;
        object-fit: contain;
        margin: 0 auto;
        display: block;
    }
    .cert-banner-logo {
        max-width: 90px;
        max-height: 60px;
        width: auto;
        height: auto;
        object-fit: contain;
        margin: 0 10px 10px 0;
        display: inline-block;
    }
</style>

<!-- Load AOS Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true
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
    error_log("Error al cargar el pie de página en about.php: " . $e->getMessage());
}

// Finalizar la captura de buffer
$output = ob_get_clean();
echo $output;
?>
