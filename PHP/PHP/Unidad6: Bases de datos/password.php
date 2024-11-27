<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$user = "root";
$server= "127.0.0.1";
$pass = "Sandia4you";
$db = "daw";

$conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$alter = "ALTER table alumnos MODIFY column pass VARCHAR(255)";

//Comprobamos que se ha cumplido el alter table
if ($conexion->query($alter) === TRUE) {
    echo "La columna 'pass' se ha modificado correctamente.";
} else {
    echo "Error al modificar la columna: " . $conexion->error;
}



?>
    
</body>
</html>