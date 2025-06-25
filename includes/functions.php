<?php
// Este archivo contiene funciones auxiliares para el proyecto.
// Se recomienda mantener aquí la lógica reutilizable.

// Incluir configuración
require_once __DIR__ . '/config.php';

// Función para obtener el idioma actual
function get_current_language() {
    global $available_languages;
    
    $lang = isset($_GET['lang']) ? $_GET['lang'] : '';
    
    if ($lang != '' && array_key_exists($lang, $available_languages)) {
        $_SESSION['lang'] = $lang;
    } else if (!isset($_SESSION['lang'])) {
        $_SESSION['lang'] = DEFAULT_LANG;
    }
    
    return $_SESSION['lang'];
}

// Función para cargar textos según el idioma
function load_language_file($section) {
    $lang = get_current_language();
    $texts = [];
    
    try {
        $lang_file = __DIR__ . '/../languages/' . $lang . '/' . $section . '.php';
        
        if (file_exists($lang_file)) {
            include $lang_file;
            if (isset($texts)) {
                return $texts;
            }
        } else {
            error_log("Archivo de idioma no encontrado: " . $lang_file);
        }
        
        // Si no existe o no tiene textos, cargar el idioma por defecto
        $default_file = __DIR__ . '/../languages/' . DEFAULT_LANG . '/' . $section . '.php';
        if (file_exists($default_file)) {
            include $default_file;
            if (isset($texts)) {
                return $texts;
            }
        } else {
            error_log("Archivo de idioma por defecto no encontrado: " . $default_file);
            
            // Mostrar un mensaje más explicativo en desarrollo
            if (ini_get('display_errors')) {
                echo "<div style='background-color: #ffcccc; border: 1px solid #ff0000; padding: 10px; margin: 10px;'>";
                echo "<strong>Error:</strong> No se encontró el archivo de idioma para la sección '{$section}' en el idioma '{$lang}' ni en el idioma por defecto.";
                echo "<br>Buscado en: {$lang_file}";
                echo "<br>Buscado en: {$default_file}";
                echo "</div>";
            }
        }
        
        return [];
    } catch (Exception $e) {
        error_log("Error al cargar el archivo de idioma: " . $e->getMessage());
        
        // Mostrar un mensaje más explicativo en desarrollo
        if (ini_get('display_errors')) {
            echo "<div style='background-color: #ffcccc; border: 1px solid #ff0000; padding: 10px; margin: 10px;'>";
            echo "<strong>Error:</strong> " . $e->getMessage();
            echo "</div>";
        }
        
        return [];
    }
}

// Función para generar la URL con idioma
function lang_url($url, $lang) {
    $parsed_url = parse_url($url);
    $query = isset($parsed_url['query']) ? $parsed_url['query'] : '';
    parse_str($query, $params);
    $params['lang'] = $lang;
    $parsed_url['query'] = http_build_query($params);
    return $parsed_url['path'] . '?' . $parsed_url['query'];
}

// Función para mostrar un mensaje
function show_message($message, $type = 'info') {
    return '<div class="alert alert-' . $type . '">' . $message . '</div>';
}

// Función para redireccionar
function redirect($url) {
    header('Location: ' . $url);
    exit();
}

// Función para comprobar si el usuario está logueado
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

// Función para obtener la página actual
function get_current_page() {
    $script_name = $_SERVER['SCRIPT_NAME'];
    $base_dir = dirname($_SERVER['SCRIPT_NAME']);
    
    if (basename($base_dir) == 'public_html') {
        $current_page = basename($script_name);
    } else {
        $current_page = str_replace($base_dir . '/', '', $script_name);
    }
    
    return $current_page;
}

// Función para formatear la fecha
function format_date($date, $format = 'd/m/Y') {
    $timestamp = strtotime($date);
    return date($format, $timestamp);
}

// Función para truncar texto
function truncate_text($text, $length = 100, $append = '...') {
    if (strlen($text) > $length) {
        $text = substr($text, 0, $length) . $append;
    }
    return $text;
}

// Función para generar un token CSRF
function generate_csrf_token() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Función para verificar un token CSRF
function verify_csrf_token($token) {
    if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
        return false;
    }
    return true;
}

// Función para enviar correo
function send_email($to, $subject, $message, $headers = '') {
    $default_headers = "MIME-Version: 1.0" . "\r\n";
    $default_headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $default_headers .= "From: " . SITE_NAME . " <" . ADMIN_EMAIL . ">\r\n";
    
    $all_headers = $default_headers . $headers;
    
    return mail($to, $subject, $message, $all_headers);
}
?>
