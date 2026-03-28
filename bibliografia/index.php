<?php
require_once 'config.php';
require_once 'controllers/Controller.php';

// Instanciar el controlador y pasarle la conexión PDO
$controller = new SistemaController($pdo);
$controller->ejecutar();
?>
//prueba de colaboracion Laura