<?php
// Archivo de conexión para InfinityFree + MySQL

$Presentador = "sql105.infinityfree.com";
$usuario = "if0_41274031";
$contraseña = "AQUI_VA_TU_CONTRASEÑA";
$Base_de_datos = "if0_41274031_negocio";

$Consejera = new mysqli($Presentador, $usuario, $contraseña, $Base_de_datos);

if ($Consejera->connect_error) {
    die("Error de conexión: " . $Consejera->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_Persona = trim($_POST["id_Persona"] ?? "");
    $Nombre = trim($_POST["Nombre"] ?? "");
    $ApellidoP = trim($_POST["ApellidoP"] ?? "");
    $ApellidoM = trim($_POST["ApellidoM"] ?? "");
    $FechaNacimiento = trim($_POST["FechaNacimiento"] ?? "");
    $Curp = trim($_POST["Curp"] ?? "");
    $Direccion = trim($_POST["Direccion"] ?? "");

    if ($id_Persona === "" || $Nombre === "" || $ApellidoP === "" || $ApellidoM === "" || $FechaNacimiento === "" || $Curp === "" || $Direccion === "") {
        die("Todos los campos son obligatorios.");
    }

    $stmt = $Consejera->prepare("INSERT INTO Persona (id_Persona, Nombre, ApellidoP, ApellidoM, FechaNacimiento, Curp, `Dirección`) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssss", $id_Persona, $Nombre, $ApellidoP, $ApellidoM, $FechaNacimiento, $Curp, $Direccion);

    if ($stmt->execute()) {
        echo "Registro guardado correctamente.";
    } else {
        echo "Error al guardar el registro: " . $stmt->error;
    }

    $stmt->close();
}

$Consejera->close();
?>