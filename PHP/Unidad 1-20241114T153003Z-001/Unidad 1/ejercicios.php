<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>EJERCICIO1</h2>

<?php
$int =5;
echo gettype($int);

$double = 54.5;
echo gettype($double);

$String = "hola";
echo gettype($String);
$boolean = true;
echo gettype($boolean);

?>


<H2>Ejercicio 2</H2>
<?php
$a = 5;
$b = 5;
$c = $a%$b;
echo $c;

$potencia = $a**$b;
echo $potencia;

?>

<H2>Ejercicio 3</H2>

<?php
$nombre = "Sete";
$apellidos = "Ruiz-Garcia";
$añoNacimiento=1987;
echo "
<table border = 2>
<tr>
    <td>Nombre</td>
    <td>$nombre</td>
</tr>
<tr>
    <td>Apellido</td>
    <td>$apellidos</td>
    <tr>
        <td>Año de nacimiento</td>
        <td>$añoNacimiento</td>
    </tr>
</tr>
</table>
"
?>

<H2>Ejercicio 4</H2>

<?php
$edad = 25;
$edadEnDiezAños = $edad +10;
$edadParaJubilarte = 65 - $edad;

echo "Actualmente tienes " . $edad . "años, en 10 años tendras " 
. $edadEnDiezAños . " años y te faltan " . $edadParaJubilarte . 
"años para jubilarte";

?>

<H2>Ejercicio 5</H2>
<?PHP
$precio =500;
if ($precio >= 1000) {
    echo "caro";
}
    elseif ($precio < 1000 && $precio > 500) {
        echo "medio";
    } elseif ($precio < 1000 && $precio > 100) {
        echo "barato";
    } else{
        echo "precio negativo";
    }

?>
   
<H2>Ejercicio 6</H2>

<?php
$hora = 23;  
$minuto = 59; 
$segundo = 59; 


$segundo++;


if ($segundo >= 60) {
    $segundo = 0;
    $minuto++; 

    if ($minuto >= 60) {
        $minuto = 0;
        $hora++; 

        if ($hora >= 24) {
            $hora = 0;
        }
    }
}

echo "La hora un segundo después es: " . $hora . ":" . $minuto . ":" . $segundo;

?>

<H2>Ejercicio 7</H2>

<?php

$maximo = 10;
for ($i=1 ; $i < $maximo ; $i++ ) { 
echo $i;
}

?>

<H2>Ejercicio 8</H2>

<?php
echo "<ul>";
for ($i = 9; $i <= 15; $i++) {
    echo "<li>$i</li>";
}
echo "</ul>";

?>

<H2>Ejericicio 9</H2>

<?php
echo "<p>";
for ($i = 0; $i <= 10; $i += 2) {
    echo $i;
    if ($i < 10) {
        echo ", ";
    }
}
echo "</p>";
?>

<h2>Ejercicio10</h2>

<?php

for ($i = 50; $i >= 20; $i--) {
    if ($i % 3 != 0 && $i % 7 != 0) {
    
        if ($i > 20) {
            echo $i . ", ";
        } else {
            echo $i;
        }
    }
}

?>

<h2>Ejericicio11</h2>

<?php

$suma = 0;
for ($i = 1; $i <= 10; $i++) {
    $suma += $i;
}
echo "La suma de los números del 1 al 10 es: " . $suma;

?>

<h2>Ejercicio12</h2>

<?php
$numero = 3;  
$factorial = 1;

for ($i = 1; $i <= $numero; $i++) {
    $factorial *= $i;
}

echo "El factorial de $numero es: $factorial";

?>

<h2>Ejercicio13</h2>

<?php

$base = 2;
$exponente = 5;
$resultado = 1;

for ($i = 0; $i < $exponente; $i++) {
    $resultado *= $base;
}

echo "$base elevado a $exponente es: $resultado";

?>

<h2>Ejercicio14</h2>

<?php

$base = 2;
$exponente = 5;
$resultado = 1;
$contador = 0;

while ($contador < $exponente) {
    $resultado *= $base;
    $contador++;
}

echo "$base elevado a $exponente es: $resultado";

?>

<h2>Ejercicio15</h2>

<?php

$numero = 7; 

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Multiplicador</th><th>Resultado</th></tr>";

for ($i = 0; $i <= 10; $i++) {
    $resultado = $numero * $i;
    echo "<tr><td>{$numero} x {$i}</td><td>{$resultado}</td></tr>";
}

echo "</table>";

?>

<h2>Ejercicio16</h2>
<?php

$n=20;
$num1 = 0;
$num2 = 1;
echo $num1 . " ";
echo $num2 . " ";

for ($i=3; $i <$n ; $i++) { 
    $num3 = $num1 +$num2;
    echo $num3 . " ";
    $num1 = $num2;
    $num2 = $num3;
}
?>

<h2>Ejercicio17</h2>
<?php

$filas = 3;
$columnas = 5;


for ($i = 0; $i < $filas; $i++) {
    for ($j = 0; $j < $columnas; $j++) {
        echo "*  ";
    }
    echo "<br>";
}
?>

<h2>Ejercicio18</h2>
<?php

$filas = 5;

for ($i=0; $i <= $filas ; $i++) { 
    for ($j=1; $j <= $i; $j++) { 
        echo "* ";
    }
    echo "<br>";
}
?>

<h2>Ejercicio19</h2>
<?php

$filas = 5;

for ($i=0; $i <= $filas ; $i++) { 
    for ($j=1; $j <= $i; $j++) { 
        echo $j . " ";
    }
    echo "<br>";
}
?>

<h2>Ejercicio21</h2>

<?php
$cadena = "   Hola mundo   ";

// Imprimir la cadena con espacios
echo "Cadena con espacios: '" . $cadena . "'\n <br>";

// Eliminar los espacios con trim()
$cadena_sin_espacios = trim($cadena);
echo "Cadena sin espacios: '" . $cadena_sin_espacios . "'\n";


?>


</body>
</html>