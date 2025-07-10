    </main>

    <!-- Footer -->
    <footer class="footer bg-dark text-white pt-5 pb-3">
        <div class="container">
            <div class="row">                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">                    <div class="footer-about">
                        <a href="<?php echo BASE_URL; ?>">
                            <img src="<?php echo BASE_URL; ?>img/logo/logo%20sepstar.png" alt="<?php echo SITE_NAME; ?>" class="footer-logo mb-3">
                        </a>
                        <p><?php echo $about_texts['footer_company_desc'] ?? 'Sepstar México S DE RL DE CV is committed to providing customers with high-quality, high value-added products and services, striving for excellence and timely, efficient service.'; ?></p>
                        <div class="social-icons mt-3">
                            <a href="https://www.facebook.com/sepstar" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/sepstar" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/sepstar/" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.youtube.com/sepstar" target="_blank" class="social-icon"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">                    <h5 class="footer-heading mb-3"><?php echo $about_texts['footer_links'] ?? 'Links'; ?></h5>
                    <ul class="footer-links">
                        <li><a href="<?php echo BASE_URL; ?>"><?php echo $about_texts['footer_home'] ?? 'Home'; ?></a></li>
                        <li><a href="<?php echo BASE_URL; ?>about.php"><?php echo $about_texts['footer_about'] ?? 'About Us'; ?></a></li>
                        <li><a href="<?php echo BASE_URL; ?>manufacturing.php"><?php echo $about_texts['footer_manufacturing'] ?? 'Manufacturing'; ?></a></li>
                        <li><a href="<?php echo BASE_URL; ?>products.php"><?php echo $about_texts['footer_products'] ?? 'Products'; ?></a></li>
                        <li><a href="<?php echo BASE_URL; ?>news.php"><?php echo $about_texts['footer_news'] ?? 'News'; ?></a></li>
                        <li><a href="<?php echo BASE_URL; ?>contact.php"><?php echo $about_texts['footer_contact'] ?? 'Contact'; ?></a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">                    <h5 class="footer-heading mb-3"><?php echo $about_texts['footer_services'] ?? 'Services'; ?></h5>
                    <ul class="footer-links">
                        <li><a href="<?php echo BASE_URL; ?>services/oem-manufacturing.php"><?php echo $about_texts['footer_oem'] ?? 'OEM Manufacturing'; ?></a></li>
                        <li><a href="<?php echo BASE_URL; ?>services/odm-manufacturing.php"><?php echo $about_texts['footer_odm'] ?? 'ODM Manufacturing'; ?></a></li>
                        <li><a href="<?php echo BASE_URL; ?>services/quality-control.php"><?php echo $about_texts['footer_quality'] ?? 'Quality Control'; ?></a></li>
                        <li><a href="<?php echo BASE_URL; ?>services/supply-chain.php"><?php echo $about_texts['footer_supply'] ?? 'Supply Chain'; ?></a></li>
                        <li><a href="<?php echo BASE_URL; ?>services/logistics.php"><?php echo $about_texts['footer_logistics'] ?? 'Logistics'; ?></a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="footer-heading mb-3"><?php echo $about_texts['footer_contact_title'] ?? 'Contact'; ?></h5>
                    <ul class="footer-contact">
                        <li><i class="fas fa-map-marker-alt"></i> <?php echo $about_texts['footer_address'] ?? 'No. 1, Science and Technology 7th road, Monterrey, Nuevo León, México'; ?></li>
                        <li><i class="fas fa-phone"></i> <?php echo $about_texts['footer_phone'] ?? '+86-756-3390011'; ?></li>
                        <li><i class="fas fa-envelope"></i> <a href="mailto:zhangjing@sepstar-eti.com"><?php echo $about_texts['footer_email'] ?? 'zhangjing@sepstar-eti.com'; ?></a></li>
                    </ul>
                    <div class="newsletter mt-3">
                        <h6><?php echo $about_texts['footer_newsletter'] ?? 'Subscribe to our newsletter'; ?></h6>
                        <form action="<?php echo BASE_URL; ?>subscribe.php" method="post" class="newsletter-form">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="<?php echo $about_texts['footer_email_placeholder'] ?? 'Your email'; ?>" required>
                                <button type="submit" class="btn btn-primary"><?php echo $about_texts['footer_subscribe'] ?? 'Subscribe'; ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom border-top mt-4 pt-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="copyright mb-0">&copy; <?php echo date('Y'); ?> Sepstar México. <?php echo $about_texts['footer_rights'] ?? 'All rights reserved.'; ?></p>
                    </div>
                    <div class="col-md-6 text-md-end">                        <ul class="footer-bottom-links">
                            <li><a href="<?php echo BASE_URL; ?>/privacy-policy.php"><?php echo $about_texts['footer_privacy'] ?? 'Privacy Policy'; ?></a></li>
                            <li><a href="<?php echo BASE_URL; ?>/terms-of-service.php"><?php echo $about_texts['footer_terms'] ?? 'Terms and Conditions'; ?></a></li>
                            <li><a href="<?php echo BASE_URL; ?>/sitemap.php"><?php echo $about_texts['footer_sitemap'] ?? 'Sitemap'; ?></a></li>
                        </ul>
                    </div>
                </div>            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top" id="backToTop"><i class="fas fa-arrow-up"></i></a>
    
    <!-- Cookie Consent -->
    <div class="cookie-consent" id="cookieConsent">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-7">
                    <p class="mb-md-0">Utilizamos cookies para mejorar su experiencia en nuestro sitio web. Al continuar navegando, acepta nuestro uso de cookies.</p>
                </div>
                <div class="col-lg-4 col-md-5 text-md-end">
                    <button class="btn btn-light me-2" id="cookieAccept">Aceptar</button>
                    <a href="/privacy-policy.php" class="btn btn-outline-light">Más información</a>
                </div>
            </div>
        </div>
    </div>
      <!-- Whatsapp Button -->
    <a href="https://wa.me/528113547718" class="whatsapp-button" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
    
    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- AOS (Animate On Scroll) -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
      <!-- Custom JavaScript -->
    <script src="<?php echo BASE_URL; ?>/js/main.js"></script>
    
    <!-- Page specific JavaScript -->
    <?php if (isset($page_js)): ?>
    <script src="<?php echo BASE_URL; ?>/js/<?php echo $page_js; ?>.js"></script>
    <?php endif; ?>
      <!-- Initialize AOS -->
    <script>
        AOS.init({
            once: true,
            duration: 600, /* Reducido de 800ms a 600ms para animaciones más rápidas */
            offset: 50,    /* Reducido de 100 a 50 para que se activen antes las animaciones */
            delay: 0       /* Sin retraso para elementos AOS */
        });
    </script>
</body>
</html>
