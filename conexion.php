<?php
// Archivo de conexión para InfinityFree + MySQL
// IMPORTANTE: renombrar este archivo a conexion.php si GitHub no permite crearlo directamente.

$host = "sql105.infinityfree.com"; // Cambia XXX por el servidor MySQL de InfinityFree
$user = "if0_41274031";            // Cambia por tu usuario MySQL
$password = "pattyherrera26";        // Cambia por tu contraseña
$database = "if0_41274031_negocio";      // Cambia por el nombre de tu base de datos

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"] ?? "");
    $correo = trim($_POST["correo"] ?? "");

    if ($nombre === "" || $correo === "") {
        die("Todos los campos son obligatorios.");
    }

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo) VALUES (?, ?)");
    $stmt->bind_param("ss", $nombre, $correo);

    if ($stmt->execute()) {
        echo "Usuario guardado correctamente.";
    } else {
        echo "Error al guardar usuario: " . $stmt->error;
    }

    $stmt->close();
}
