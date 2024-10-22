<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Pruebas con la Clase Circunferencia</h2>

    <?php
    require "Circunferencia.php"; 
    $circunferencia = new Circunferencia(5); 
    echo $circunferencia->info();
    ?>

    <br>

    <h2>Pruebas con las Clase Punto</h2>

    <?php
    require "Punto.php";
    $punto = new Punto(5, 5);
    echo $punto->__toString();


    ?>
    
</body>
</html>
