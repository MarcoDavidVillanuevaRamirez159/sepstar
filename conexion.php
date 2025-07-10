<?php
$serverName = "DESKTOP-CUGKEU4"; // Nombre del servidor SQL
$connectionOptions = array(
    "Database" => "sepstar-produccion"
);

// Conexión
$conn = sqlsrv_connect($serverName, $connectionOptions);
// No imprimir nada aquí, ni echo ni die, para evitar romper respuestas JSON
?>
