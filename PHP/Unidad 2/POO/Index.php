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

<h2>Prueba con la Clase Cuadrado</h2>
    <?php
    require_once "Poligono.php";
    require_once "Cuadrado.php";

    $cuadrado1= new Cuadrado(4, "rojo");
    print_r("El area del cuadrado es " .$cuadrado1 ->calcularArea() . "<br>");
   
    print_r("El perimetro del cuadrado es " .$cuadrado1 ->calcularPerimetro() . "<br>");
    echo $cuadrado1;
    ?>

    <h2>Prueba con la Clase TrianguloRectangulo</h2>
    <?php
    require_once "Poligono.php";
    require_once "TrianguloEquilatero.php";
    // Crear el triángulo con lado = 4.8 y altura = 5.3, con color por defecto
    $t1 = new TrianguloEquilatero(4.8, 5.3);
    print_r("El area del triangulo es " . $t1->calcularArea() . "<br>");       
    print_r("El perimetro del triangulo es " . $t1->calcularPerimetro() . "<br>");  
    echo $t1;  
    
?>
</body>
</html>