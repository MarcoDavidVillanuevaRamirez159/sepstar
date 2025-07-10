<?php
// Este archivo contiene la configuración general del proyecto.
// Se recomienda mantener aquí las constantes y variables globales.

// Activar reporte de errores para desarrollo
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'usuario_db');
define('DB_PASS', 'contraseña_db');
define('DB_NAME', 'sepstar_db');

// Configuración del sitio
define('SITE_NAME', 'Sepstar México');
define('SITE_URL', 'https://www.sepstar-eti.com');
define('BASE_URL', '/sepstar.itaas.com.mx - sql/');
define('ADMIN_EMAIL', 'zhangjing@sepstar-eti.com');

// Configuración de idiomas
define('DEFAULT_LANG', 'es');
$available_languages = array(
    'es' => 'Español',
    'en' => 'English',
    'zh' => '中文'
);

// Zona horaria
date_default_timezone_set('America/Mexico_City');

// Función para conectar a la base de datos
function conectar_db() {
    try {
        $conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        if ($conexion->connect_error) {
            error_log("Error de conexión a la base de datos: " . $conexion->connect_error);
            return false;
        }
        
        $conexion->set_charset("utf8");
        return $conexion;
    } catch (Exception $e) {
        error_log("Error al conectar a la base de datos: " . $e->getMessage());
        return false;
    }
}

// Función para limpiar entradas
function limpiar($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
