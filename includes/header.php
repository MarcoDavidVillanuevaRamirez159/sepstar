<?php
// Iniciar sesión
session_start();

// Incluir funciones
require_once __DIR__ . '/functions.php';

// Obtener el idioma actual
$current_lang = get_current_language();

// Obtener la página actual
$current_page = get_current_page();

// Cargar textos del header
$header_texts = load_language_file('header');
?>
<!DOCTYPE html>
<html lang="<?php echo $current_lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - ' . SITE_NAME : SITE_NAME; ?></title>    <meta name="description" content="<?php echo isset($page_description) ? $page_description : 'Sepstar México S DE RL DE CV - Líder en fabricación de alta calidad de componentes para electrodomésticos y automotriz. Innovación y excelencia en manufactura mexicana.'; ?>">
      <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>/img/logo y favicon/favicon_sepstar.ico" type="image/x-icon">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
      <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/style.css">
    
    <!-- Page specific CSS -->
    <?php if (isset($page_css)): ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/<?php echo $page_css; ?>.css">
    <?php endif; ?>
    
    <!-- Structured data for SEO -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",      "@type": "Organization",      "name": "Sepstar México",
      "url": "<?php echo SITE_URL; ?>",
      "logo": "<?php echo SITE_URL; ?>/img/logo/logo sepstar.png",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+86-756-3390011",
        "contactType": "customer service"
      },
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "No. 1, Science and Technology 7th road",
        "addressLocality": "Monterrey",
        "addressRegion": "Nuevo León",
        "addressCountry": "México"
      },
      "sameAs": [
        "https://www.facebook.com/sepstar",
        "https://twitter.com/sepstar",
        "https://www.instagram.com/sepstar/",
        "https://www.youtube.com/sepstar"
      ]
    }
    </script>
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL . $_SERVER['REQUEST_URI']; ?>">
    <meta property="og:title" content="<?php echo isset($page_title) ? $page_title . ' - ' . SITE_NAME : SITE_NAME; ?>">
    <meta property="og:description" content="<?php echo isset($page_description) ? $page_description : 'Sepstar México S DE RL DE CV - Fabricación de alta calidad para industrias de electrodomésticos y automotriz en América del Norte'; ?>">
    <meta property="og:image" content="<?php echo isset($page_image) ? $page_image : SITE_URL . '/img/og-image.jpg'; ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo SITE_URL . $_SERVER['REQUEST_URI']; ?>">
    <meta property="twitter:title" content="<?php echo isset($page_title) ? $page_title . ' - ' . SITE_NAME : SITE_NAME; ?>">
    <meta property="twitter:description" content="<?php echo isset($page_description) ? $page_description : 'Sepstar México S DE RL DE CV - Fabricación de alta calidad para industrias de electrodomésticos y automotriz en América del Norte'; ?>">
    <meta property="twitter:image" content="<?php echo isset($page_image) ? $page_image : SITE_URL . '/img/og-image.jpg'; ?>">
    
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-XXXXXXXXXX');
    </script>
</head>
<body class="page-<?php echo $current_page; ?>">
    <!-- Header -->
    <header class="header">
        <div class="top-bar py-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="contact-info">
                            <span><i class="fas fa-phone me-2"></i> +86-756-3390011</span>
                            <span class="ms-3"><i class="fas fa-envelope me-2"></i> zhangjing@sepstar-eti.com</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="language-selector">
                            <?php foreach ($available_languages as $code => $name): ?>
                                <a href="<?php echo lang_url($_SERVER['REQUEST_URI'], $code); ?>" class="<?php echo ($current_lang == $code) ? 'active' : ''; ?>">
                                    <?php echo $name; ?>
                                </a>
                                <?php if ($code !== array_key_last($available_languages)): ?>
                                    <span class="separator">|</span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="social-icons ms-3 d-inline-block">
                            <a href="https://www.facebook.com/sepstar" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/sepstar" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/sepstar/" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.youtube.com/sepstar" target="_blank"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="main-header py-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4">                        <div class="logo">                            <a href="/">
                                <img src="<?php echo BASE_URL; ?>/img/logo/LOGONEGRO.png" alt="<?php echo SITE_NAME; ?>" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarMain">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item <?php echo ($current_page == 'index') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="/"><?php echo $header_texts['home']; ?></a>
                                    </li>
                                    <li class="nav-item <?php echo ($current_page == 'about') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="/about.php"><?php echo $header_texts['about']; ?></a>
                                    </li>
                                    <li class="nav-item <?php echo ($current_page == 'manufacturing') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="/manufacturing.php"><?php echo $header_texts['manufacturing']; ?></a>
                                    </li>
                                    <li class="nav-item <?php echo ($current_page == 'products') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="/products.php"><?php echo $header_texts['products']; ?></a>
                                    </li>
                                    <li class="nav-item <?php echo ($current_page == 'news') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="/news.php"><?php echo $header_texts['news']; ?></a>
                                    </li>
                                    <li class="nav-item <?php echo ($current_page == 'contact') ? 'active' : ''; ?>">
                                        <a class="nav-link" href="/contact.php"><?php echo $header_texts['contact']; ?></a>
                                    </li>
                                </ul>
                                <div class="search-box ms-3">
                                    <form action="/search.php" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="q" placeholder="<?php echo $header_texts['search']; ?>">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Breadcrumbs for inner pages -->
    <?php if ($current_page != 'index'): ?>
    <div class="breadcrumbs py-3 bg-light">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/"><?php echo $header_texts['home']; ?></a></li>
                    <?php if (isset($breadcrumbs)): ?>
                        <?php foreach($breadcrumbs as $link => $title): ?>
                            <?php if ($link === array_key_last($breadcrumbs)): ?>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                            <?php else: ?>
                                <li class="breadcrumb-item"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo isset($page_title) ? $page_title : ucfirst($current_page); ?></li>
                    <?php endif; ?>
                </ol>
            </nav>
        </div>
    </div>
    <?php endif; ?>

    <!-- Main Content -->
    <main class="main-content">

    <!-- Icono de carga -->
    <div id="loading-icon" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%);">
        <img src="/img/loading-star-orange.gif" alt="Cargando...">
    </div>

    <script>
        document.onreadystatechange = function () {
            const loadingIcon = document.getElementById('loading-icon');
            if (document.readyState === 'loading') {
                loadingIcon.style.display = 'block';
            } else {
                loadingIcon.style.display = 'none';
            }
        };
    </script>
