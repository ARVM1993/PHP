<?php
session_start()

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos de Usuario</title>
</head>
<body>
    <?php

    if (!isset ($_SESSION["registrado"])) {
        header("Location: ./formAR.php");
        exit();
    }
    $nombre = $_SESSION["nombre"];
    $telefono = $_SESSION["telefono"];
    $nombre = $_SESSION["nombre"];
    
    $nombre = $_SESSION["nombre"];
    $telefono = $_SESSION["telefono"];
    $tipo = $_SESSION["tipo"];
    echo "<p>Nombre: $nombre. Número de teléfono: $telefono</p>";
    if (empty($tipo)) {
        echo "<p>El tipo de usuario no ha sido especificado.</p>";
        }else{
            echo "<p>El tipo de usuario es: $tipo</p>";
        }
    ?>
</body>
</html>
