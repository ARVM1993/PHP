<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>EJERCICIO 3: FUNCIONES</h1>

<h2>Funcion: filtrar</h2>
<?php
include "./funcionesAR.php";
/*Al ser una array mas compleja que una cadena de 
strings, en vez de echo, se imprimira con print_r*/
print_r(filtrar([1,2,3,4,5,6,7,8,9], true));
echo "<br>";
print_r(filtrar([3,5,2,4,7,6,7,2,1]), false);
echo "<br>";
print_r(filtrar([], true));
echo "<br>";
print_r(filtrar([3], true));
echo "<br>";
print_r(filtrar([1,2,3,4,5,6,7,8,9]));


?>

<h2>Funcion: sumarNegativos</h2>

<?php

echo sumarNegativos(1,3,5,-6,-4,-8,-3,-8);
echo "<br>";
echo sumarNegativos();
echo "<br>";
echo sumarNegativos(1,2,3,4,5,6,7,8,9);
echo "<br>";

?>

<h2>Funcion: describirPersona</h2>
<?php

$persona1 = [
    "nombre" => "Aitor",
    "edad" => 31,
    "matricula" => true
];
$persona2 = [
    "nombre" => "Lucia",
    "edad" => 19,
    "matricula" => true
];

$persona3 = [
    "nombre" => "Jaime",
    "edad" => 23,
    "matricula" => false
];

echo describirPersona($persona1);
echo "<br>";
echo describirPersona($persona2);
echo "<br>";
echo describirPersona($persona3);
  

?>

<h2>Función: calcularMedias</h2>

<?php
$notas = [
    "Luz" => [7.2, 9.7, 8],
    "Alberto" => [],
    "Juan" => [4.1, 8]
];

$resultado = calcularMedias($notas);
var_dump(value: $resultado);
?>
    
</body>
</html>