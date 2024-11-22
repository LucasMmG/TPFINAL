<?php
$host = "localhost";
$user = "root"; // Usuario de MySQL
$pass = "";     // Contraseña de MySQL
$dbname = "trabajo_final";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>