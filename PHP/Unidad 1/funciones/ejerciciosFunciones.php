<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>EJERCICIO 1</h1>
<?php 
function imprimeMayor($num1, $num2){   
    if ($num1 > $num2) {
        echo $num1 . " es mayor que " .  $num2;
    } elseif ($num1< $num2) {
        echo $num1 . " es menor que " . $num2;
    } else {
      echo "Son iguales";  
    }

}
$numeroAzar1 =rand(1,9);
$numeroAzar2 =rand(1,9);

echo imprimeMayor($numeroAzar1, $numeroAzar2);

?>

<h1>EJERCICIO 2</h1>

<?php

function mayor ($num1, $num2){
    if ($num1 > $num2) {
        return $num1;
    } elseif ($num1< $num2) {
        return $num2;
    } else {
      echo "Son iguales";  
    }

}
$numeroAzar1 =rand(1,9);
$numeroAzar2 =rand(1,9);

echo mayor($numeroAzar1, $numeroAzar2);
?>

<h1>EJERCICIO 3</h1>


<?php

function esMayor($a, $b){
    if ($a>$b) {
        return true;
    } if ($a<=$b) {
        return false;
    } 

}

$a =rand(1,9);
$b =rand(1,9);
echo esMayor($a, $b);

?>

<h1>EJERCICIO 4</h1>

<?php

function cuentaCaracteres($caracter){
       $numero = strlen($caracter);

    return $numero;   
    }

    $palabra = "Hello";

echo cuentaCaracteres($palabra);
    
?>

<h1>EJERCICIO 5</h1>

<?php 

function cuentaCaracter($caracter){
    $contador =0;
    $vocales = ["a","e","i","o", "u"];
    for ($i=0; $i <strlen($caracter) ; $i++) {
        if (in_array($caracter[$i], $vocales)) {
            $contador ++;
        }
            
    }
    return $contador;
}

$palabra = "hello world";
echo cuentaCaracter($palabra);
?>

<h1>EJERCICIO 6</h1>

<?php

function aumentaODisminuye($num, $booleano){
    if ($booleano == true) {
        return ++$num;
    }else{
        return --$num;
    
    }
}
$bool = array(true, false);
$boleano = $bool[array_rand($bool)];
$numero = 10;

echo aumentaODisminuye($numero, $boleano);


?>

<h1>EJERCICIO 7</h1>
<?php
function esPar($num){
    if ($num % 2 == 0) {
        return true;
     }else{
        return false;
    }

}
$num = rand(1,100);

echo esPar($num);
if (esPar($num)) {
    echo "El numero $num es par";
} else {
    echo "El numero $num es impar";
}

?>
<h1>EJERCICIO 8</h1>

<?php

function arrayAleatorio($tamaño, $minimo, $maximo) {
    $array = [];

    for ($i = 0; $i < $tamaño; $i++) { 
        $array[$i] = rand($minimo, $maximo); 
    
    }
    return $array; 
}

$tamaño = 10; 
$minimo = 1;   
$maximo = 100; 

$resultado = arrayAleatorio($tamaño, $minimo, $maximo); 
print_r($resultado);

?>

<h1>EJERCICIO 9</h1>
<?php

function arrayPares($arrayNumeros){
    $arrayPares = [];

    foreach ($arrayNumeros as $numero){
        if ($numero % 2 == 0) {
            $arrayPares[] = $numero;
            
        }
    }
    return $arrayPares;
}


$arrayNumeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$resultado = arrayPares($arrayNumeros); 
print_r($resultado); 

?>

<h1>EJERCICIO 10</h1>

<?php

function digitos($num){
    $num = strval($num);
    $longitud = strlen($num);
    return $longitud;
}

$num =5000;
echo digitos($num);
?>

<h1>EJERCICIO 11</h1>

<?php

function coronasAEuros ($coronasDanesas){
    $euros = $coronasDanesas * 0.0075;
    return $euros;
}
function eurosACoronas ($euros){
    $coronasDanesas = $euros / 0.0075;
    return $coronasDanesas;
}

$euros = 5.5;
$coronasDanesas= 3.6;

echo coronasAEuros($euros);
echo eurosACoronas($coronasDanesas);


?>

<h1>EJERCICIO 12</h1>
<?php
function modifica($numero, $cantidad) {
    $numero += $cantidad;

}
$num = 10;
modifica($num, 5);
echo $num; 

/*
Sí, el valor de la variable $numero sí se modifica. 
Esto se debe a que al pasar la variable por referencia 
(con &), la función trabaja directamente con la variable 
original, por lo que cualquier cambio en la variable dentro 
de la función se refleja fuera de ella. 
*/
?>
</body>
</html>