<?php
header('Content-Type: application/json');
include 'conexion.php';

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // --- Seguridad: Validación y sanitización estricta ---
    session_start();
    // Protección CSRF
    if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $response['message'] = 'Petición inválida (CSRF).';
        echo json_encode($response);
        exit;
    }

    // Limitar intentos por IP (rate limiting simple)
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $rateFile = __DIR__ . '/logs/rate_' . md5($ip) . '.txt';
    $now = time();
    $window = 60; // segundos
    $maxRequests = 5;
    $requests = [];
    if (file_exists($rateFile)) {
        $requests = json_decode(file_get_contents($rateFile), true) ?: [];
        $requests = array_filter($requests, function($t) use ($now, $window) { return $t > $now - $window; });
    }
    if (count($requests) >= $maxRequests) {
        $response['message'] = 'Demasiados intentos. Intenta más tarde.';
        echo json_encode($response);
        exit;
    }
    $requests[] = $now;
    file_put_contents($rateFile, json_encode($requests));

    // --- Seguridad: Validación de User-Agent y Referer ---
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
    $referer = $_SERVER['HTTP_REFERER'] ?? '';
    if (empty($userAgent) || stripos($userAgent, 'bot') !== false) {
        $response['message'] = 'Petición sospechosa (User-Agent).';
        echo json_encode($response);
        exit;
    }
    if (empty($referer) || strpos($referer, $_SERVER['HTTP_HOST']) === false) {
        $response['message'] = 'Petición sospechosa (Referer).';
        echo json_encode($response);
        exit;
    }

    // --- Seguridad: Bloqueo de palabras peligrosas (WAF básico) ---
    $inputFields = [$_POST['nombre'] ?? '', $_POST['email'] ?? '', $_POST['telefono'] ?? '', $_POST['asunto'] ?? '', $_POST['mensaje'] ?? ''];
    $badPatterns = '/(select\s+|insert\s+|update\s+|delete\s+|drop\s+|truncate\s+|union\s+|--|;|<script|<iframe|<img|onerror=|onload=)/i';
    foreach ($inputFields as $field) {
        if (preg_match($badPatterns, $field)) {
            $response['message'] = 'Contenido no permitido.';
            echo json_encode($response);
            exit;
        }
    }

    // Sanitización y validación
    $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ''), ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars(trim($_POST['email'] ?? ''), ENT_QUOTES, 'UTF-8');
    $telefono = htmlspecialchars(trim($_POST['telefono'] ?? ''), ENT_QUOTES, 'UTF-8');
    $asunto = htmlspecialchars(trim($_POST['asunto'] ?? ''), ENT_QUOTES, 'UTF-8');
    $mensaje = htmlspecialchars(trim($_POST['mensaje'] ?? ''), ENT_QUOTES, 'UTF-8');

    // Limitar tamaño de campos
    if (strlen($nombre) > 255 || strlen($email) > 255 || strlen($telefono) > 50 || strlen($asunto) > 255 || strlen($mensaje) > 2000) {
        $response['message'] = 'Datos demasiado largos.';
        echo json_encode($response);
        exit;
    }

    // Validar email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['message'] = 'Correo electrónico no válido.';
        echo json_encode($response);
        exit;
    }

    // --- Seguridad: Validar IP contra lista negra (opcional, ejemplo simple) ---
    $blacklist = [
        '127.0.0.2', // ejemplo
    ];
    if (in_array($ip, $blacklist)) {
        $response['message'] = 'Acceso denegado.';
        echo json_encode($response);
        exit;
    }

    // Validar campos obligatorios
    if ($nombre && $email && $mensaje) {
        // --- Seguridad: Consultas preparadas (ya implementado) ---
        $sql = "INSERT INTO Contactos (nombre, email, telefono, asunto, mensaje) VALUES (?, ?, ?, ?, ?)";
        $params = array($nombre, $email, $telefono, $asunto, $mensaje);
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            // Loguear el error en un archivo seguro, no mostrar detalles al usuario
            $logMsg = date('Y-m-d H:i:s') . " | Error SQL: ";
            if (($errors = sqlsrv_errors()) != null) {
                foreach ($errors as $error) {
                    $logMsg .= " SQLSTATE: ".$error['SQLSTATE'].". Code: ".$error['code'].". Message: ".$error['message'];
                }
            }
            error_log($logMsg . "\n", 3, __DIR__ . "/logs/contacto_errors.log");
            $response['message'] = '❌ Error al guardar. Intenta más tarde.';
        } else {
            $response['success'] = true;
            $response['message'] = '✅ ¡Mensaje enviado correctamente!';
        }
    } else {
        $response['message'] = 'Por favor, completa todos los campos obligatorios.';
    }
} else {
    $response['message'] = 'Método no permitido.';
}

echo json_encode($response);
?>
