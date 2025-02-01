<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = '34.170.3.102'; // Dirección IP pública de Google Cloud SQL
$db = 'Distribuidor';
$user = 'Tidis';
$pass = 'Cdsp-0317fbyG';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
try {
    $options = array(
        PDO::ATTR_TIMEOUT => 30, // Establece el tiempo de espera en segundos
    );
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Conexión exitosa!";
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

?>