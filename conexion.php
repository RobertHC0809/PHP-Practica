<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "usuario"; 

$conn = new mysqli('localhost', 'root', $password, 'usuario');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
