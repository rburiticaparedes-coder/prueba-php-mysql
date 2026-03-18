<?php
// Configuración de parámetros de conexión
$host = "localhost";
$db   = "BIBLIOGRAFIA";
$user = "root";
$pass = ""; // Cambiar según su configuración

try {
    // Uso de PDO para mayor seguridad contra inyecciones SQL
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
