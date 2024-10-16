<?php
//se declara al principio activa con 1 y desactiva con 0.
//los valores declarados en la funcion son los que deben devolver
declare(strict_types= 1);
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
//declaramos el tipo en el parametro y del return
function suma(int $a, int $b): int{
return $a +$b;
}
echo suma(3,9);
echo "<br>";
//da error porque estrictamente debe devolver int
echo "<br>";

function otra($a, int $b):void{
    echo "<p> la primera variable es " . gettype($a) . 
    " y la segunda " . gettype ($b) ."</p>";
}

otra("hola", 9);


?>  
</body>
</html>