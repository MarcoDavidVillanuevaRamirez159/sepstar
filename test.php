<?php
// Habilitar la visualización de errores
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Información básica de PHP
echo "<h1>Página de prueba</h1>";
echo "<h2>Información del servidor:</h2>";
echo "<pre>";
echo "PHP Version: " . phpversion() . "\n";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "\n";
echo "Script Path: " . __FILE__ . "\n";
echo "</pre>";

// Probar la sesión
session_start();
echo "<h2>Prueba de sesión:</h2>";
$_SESSION['test'] = 'OK';
echo "Sesión iniciada: " . (isset($_SESSION['test']) ? 'Sí' : 'No') . "\n";

// Probar inclusión de archivos
echo "<h2>Prueba de inclusión de archivos:</h2>";
$configFile = __DIR__ . '/../includes/config.php';
echo "Config file exists: " . (file_exists($configFile) ? 'Sí' : 'No') . "\n";

// Mostrar constantes definidas
echo "<h2>Constantes definidas:</h2>";
if (file_exists($configFile)) {
    require_once $configFile;
    echo "BASE_URL: " . (defined('BASE_URL') ? BASE_URL : 'No definida') . "\n";
    echo "SITE_NAME: " . (defined('SITE_NAME') ? SITE_NAME : 'No definida') . "\n";
}

// Probar archivo de idioma
echo "<h2>Prueba de archivo de idioma:</h2>";
$langFile = __DIR__ . '/../languages/es/home.php';
echo "Language file exists: " . (file_exists($langFile) ? 'Sí' : 'No') . "\n";

// Probar permisos de directorio
echo "<h2>Permisos de directorios:</h2>";
echo "<pre>";
echo "public_html readable: " . (is_readable(__DIR__) ? 'Sí' : 'No') . "\n";
echo "includes readable: " . (is_readable(__DIR__ . '/../includes') ? 'Sí' : 'No') . "\n";
echo "languages readable: " . (is_readable(__DIR__ . '/../languages') ? 'Sí' : 'No') . "\n";
echo "</pre>";

// Mostrar variables del servidor
echo "<h2>Variables del servidor:</h2>";
echo "<pre>";
echo "SERVER_SOFTWARE: " . $_SERVER['SERVER_SOFTWARE'] . "\n";
echo "DOCUMENT_ROOT: " . $_SERVER['DOCUMENT_ROOT'] . "\n";
echo "SCRIPT_FILENAME: " . $_SERVER['SCRIPT_FILENAME'] . "\n";
echo "PHP_SELF: " . $_SERVER['PHP_SELF'] . "\n";
echo "</pre>";
?>
