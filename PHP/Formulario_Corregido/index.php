<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

if (!isset($_SESSION["registrado"])) {
    header("Location: ./formulario.formulario.php");
    exit();
}

        $nombre= $_SESSION["nombre"];
        $telefono =$_SESSION["telefono"] ;
        $opciones = $_SESSION["opciones"];

        echo "<p>Tu nombre es $nombre, tu teléfono es $telefono.";
    if (empty($opciones)) {
        echo "No has marcado ninguna opción</p>";
    } else {
        echo "Tu elección es $opciones</p>";
    }

?>

</body>
</html>