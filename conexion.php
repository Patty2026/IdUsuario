<?php

$Presentador="sql105.infinityfree.com";
$usuario="if0_41274031";
$contraseña="AQUI_VA_TU_CONTRASEÑA";
$Base_de_datos="if0_41274031_negocio";

$Consejera=new mysqli(
    $Presentador,
    $usuario,
    $contraseña,
    $Base_de_datos
);

if($Consejera->connect_error){
    die("Error conexión: ".$Consejera->connect_error);
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

$id_Persona=$_POST["id_Persona"];
$Nombre=$_POST["Nombre"];
$ApellidoP=$_POST["ApellidoP"];
$ApellidoM=$_POST["ApellidoM"];
$FechaNacimiento=$_POST["FechaNacimiento"];
$Curp=$_POST["Curp"];
$Direccion=$_POST["Direccion"];

$stmt=$Consejera->prepare(
"INSERT INTO Persona(
id_Persona,
Nombre,
ApellidoP,
ApellidoM,
FechaNacimiento,
Curp,
`Dirección`
)
VALUES(?,?,?,?,?,?,?)"
);

$stmt->bind_param(
"issssss",
$id_Persona,
$Nombre,
$ApellidoP,
$ApellidoM,
$FechaNacimiento,
$Curp,
$Direccion
);

$stmt->execute();

echo "Registro guardado";

$stmt->close();

}

$Consejera->close();

?>
