<?php
$host = "sqlXXX.infinityfree.com";
$user = "if0_XXXXXXXX";
$password = "TU_PASSWORD";
$database = "if0_XXXXXXXX_nombrebd";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

echo "Conexión exitosa";
?>
