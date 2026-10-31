<?php
$host = 'sql305.infinityfree.com';
$dbname = 'if0_43318260_sistema_usuarios';
$username = 'if0_43318260';
$password = 'DAmYH9sUaU';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>