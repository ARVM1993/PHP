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

    if(!isset($_SESSION["registrado"])){
        header("Location: index.php");
        exit();

    }

    $nombre=$_SESSION["nombre"];
    $telefono=$_SESSION["telefono"];
    $opciones=$_SESSION["opciones"];

    echo"<p>El nombre es: $nombre . el numero de telefono es . $telefono 
    . y las opciones son";
    if(!empty($opciones)){
        echo $opciones;
    }else{
        echo "ninguna";
    }
    ?>
    
</body>
</html>