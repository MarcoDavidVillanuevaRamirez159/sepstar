<?php
// Iniciar la captura de buffer para evitar problemas si hay errores
ob_start();

// Definir título y descripción para SEO
$page_title = 'Contacto';
$page_description = 'Póngase en contacto con Sepstar México para consultas sobre nuestros servicios de fabricación OEM y ODM para las industrias automotriz y de electrodomésticos.';
$page_css = 'contact';
$page_js = 'contact';

try {
    // Incluir solo el archivo de cabecera (header.php ya incluye config.php y functions.php correctamente)
    require_once __DIR__ . '/includes/header.php';

// Cargar textos específicos de la página
$contact_texts = load_language_file('contact');

// Procesar el formulario de contacto si se ha enviado
$message = '';
$message_type = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar el token CSRF
    if (isset($_POST['csrf_token']) && verify_csrf_token($_POST['csrf_token'])) {
        // Limpiar los datos recibidos
        // Usar los nombres correctos de los campos del formulario
        // Definir función limpiar si no existe
        if (!function_exists('limpiar')) {
            function limpiar($str) {
                return htmlspecialchars(trim($str), ENT_QUOTES, 'UTF-8');
            }
        }
        $name = isset($_POST['nombre']) ? limpiar($_POST['nombre']) : '';
        $email = isset($_POST['email']) ? limpiar($_POST['email']) : '';
        $phone = isset($_POST['telefono']) ? limpiar($_POST['telefono']) : '';
        $subject = isset($_POST['asunto']) ? limpiar($_POST['asunto']) : '';
        $message_text = isset($_POST['mensaje']) ? limpiar($_POST['mensaje']) : '';
        
        // Validar los campos requeridos
        if (empty($name) || empty($email) || empty($subject) || empty($message_text)) {
            $message = $contact_texts['error_required_fields'];
            $message_type = 'danger';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = $contact_texts['error_invalid_email'];
            $message_type = 'danger';
        } else {
            // Construir el mensaje de correo
            $email_subject = "Formulario de contacto: $subject";
            $email_body = "Nombre: $name\n";
            $email_body .= "Correo: $email\n";
            $email_body .= "Teléfono: $phone\n\n";
            $email_body .= "Mensaje:\n$message_text\n";
            
            // Enviar el correo
            $headers = "From: $name <$email>" . "\r\n";
            
            if (send_email(defined('ADMIN_EMAIL') ? ADMIN_EMAIL : 'info@localhost', $email_subject, $email_body, $headers)) {
                $message = $contact_texts['success_message'];
                $message_type = 'success';
            } else {
                $message = $contact_texts['error_sending'];
                $message_type = 'danger';
            }
        }
    } else {
        $message = $contact_texts['error_csrf'];
        $message_type = 'danger';
    }
}

// Generar un nuevo token CSRF
$csrf_token = generate_csrf_token();
?>

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h1><?php echo $contact_texts['page_title']; ?></h1>
        </div>
        <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
            <?php echo $contact_texts['page_subtitle']; ?>
        </p>
        
        <!-- Contact Info -->
        <div class="row mb-5">
            <div class="col-md-4 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-info-content">
                        <h4><?php echo $contact_texts['address_title']; ?></h4>
                        <p>No. 1, Science and Technology 7th road,<br>Monterrey, Nuevo León, México</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="contact-info-content">
                        <h4><?php echo $contact_texts['phone_title']; ?></h4>
                        <p>+86-756-3390011</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-info-content">
                        <h4><?php echo $contact_texts['email_title']; ?></h4>
                        <p>zhangjing@sepstar-eti.com</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-form">
                    <h3 class="mb-4"><?php echo $contact_texts['form_title']; ?></h3>
                    
                    <div id="contact-alert"></div>
                    <form id="contactForm" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" name="nombre" placeholder="<?php echo $contact_texts['name_placeholder']; ?>" required>
                                <div class="invalid-feedback"><?php echo $contact_texts['name_required']; ?></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="email" class="form-control" name="email" placeholder="<?php echo $contact_texts['email_placeholder']; ?>" required>
                                <div class="invalid-feedback"><?php echo $contact_texts['email_required']; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="tel" class="form-control" name="telefono" placeholder="<?php echo $contact_texts['phone_placeholder']; ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" name="asunto" placeholder="<?php echo $contact_texts['subject_placeholder']; ?>">
                            </div>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="mensaje" rows="5" placeholder="<?php echo $contact_texts['message_placeholder']; ?>" required></textarea>
                            <div class="invalid-feedback"><?php echo $contact_texts['message_required']; ?></div>
                        </div>
                        <!-- Token CSRF oculto -->
                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
                        <button type="submit" class="btn btn-primary" id="btnEnviar">
                            <?php echo $contact_texts['send_button']; ?>
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Google Map -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-map rounded shadow" id="contactMap">
                    <!-- El mapa se cargará mediante JavaScript -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Office Hours Section -->
<section class="office-hours-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0" data-aos="fade-up">
                <div class="card h-100">
                    <div class="card-body">
                        <h3 class="card-title mb-4"><?php echo $contact_texts['office_hours_title']; ?></h3>
                        <ul class="list-unstyled office-hours">
                            <li>
                                <span class="day"><?php echo $contact_texts['monday_friday']; ?></span>
                                <span class="hours">8:00 AM - 6:00 PM</span>
                            </li>
                            <li>
                                <span class="day"><?php echo $contact_texts['saturday']; ?></span>
                                <span class="hours">9:00 AM - 2:00 PM</span>
                            </li>
                            <li>
                                <span class="day"><?php echo $contact_texts['sunday']; ?></span>
                                <span class="hours"><?php echo $contact_texts['closed']; ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100">
                    <div class="card-body">
                        <h3 class="card-title mb-4"><?php echo $contact_texts['faq_title']; ?></h3>
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne">
                                        <?php echo $contact_texts['faq_1_question']; ?>
                                    </button>
                                </h2>
                                <div id="faqOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <?php echo $contact_texts['faq_1_answer']; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo">
                                        <?php echo $contact_texts['faq_2_question']; ?>
                                    </button>
                                </h2>
                                <div id="faqTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <?php echo $contact_texts['faq_2_answer']; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree">
                                        <?php echo $contact_texts['faq_3_question']; ?>
                                    </button>
                                </h2>
                                <div id="faqThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <?php echo $contact_texts['faq_3_answer']; ?>
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

<!-- CSS específico para la página de contacto -->
<style>
    .office-hours li {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
    }
    
    .office-hours li:last-child {
        border-bottom: none;
    }
    
    .office-hours .day {
        font-weight: 500;
    }
    
    .office-hours .hours {
        color: var(--primary-color);
        font-weight: 500;
    }
    
    .office-hours .closed {
        color: #dc3545;
    }
    
    .map-info-window {
        padding: 5px;
    }
    
    .map-info-window h5 {
        margin-bottom: 5px;
    }
    
    .map-info-window p {
        margin-bottom: 10px;
        font-size: 0.9rem;
    }
</style>

<script>
    function initMap() {
        const mapOptions = {
            center: { lat: 25.686614, lng: -100.316113 }, // Coordenadas de Monterrey, México
            zoom: 15,
        };

        const map = new google.maps.Map(document.getElementById('contactMap'), mapOptions);

        const marker = new google.maps.Marker({
            position: mapOptions.center,
            map: map,
            title: 'Sepstar México',
        });
    }
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>

<script>
// Validación visual Bootstrap
(function() {
    'use strict';
    var forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms).forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();

document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = e.target;
    if (!form.checkValidity()) return;
    const btn = document.getElementById('btnEnviar');
    btn.disabled = true;
    const originalText = btn.innerHTML;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Enviando...';
    const data = new FormData(form);
    fetch('guardar_contacto.php', {
        method: 'POST',
        body: data
    })
    .then(res => res.json())
    .then(res => {
        const alertDiv = document.getElementById('contact-alert');
        alertDiv.innerHTML = `<div class="alert alert-${res.success ? 'success' : 'danger'} alert-dismissible fade show" role="alert">
            ${res.message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>`;
        if (res.success) form.reset();
        btn.disabled = false;
        btn.innerHTML = originalText;
        form.classList.remove('was-validated');
    })
    .catch(() => {
        btn.disabled = false;
        btn.innerHTML = originalText;
    });
});
</script>

<?php
    // Completar el bloque try iniciado al principio
} catch (Exception $e) {
    // Si hay un error, mostrarlo en desarrollo
    if (ini_get('display_errors')) {
        echo "<div style='background-color: #ffcccc; border: 1px solid #ff0000; padding: 10px; margin: 10px;'>";
        echo "<strong>Error:</strong> " . $e->getMessage();
        echo "</div>";
    }
    // Registrar el error
    error_log("Error en contact.php: " . $e->getMessage());
}

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
    error_log("Error al cargar el pie de página en contact.php: " . $e->getMessage());
}

// Finalizar la captura de buffer
$output = ob_get_clean();
echo $output;
?>
