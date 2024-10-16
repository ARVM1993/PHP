<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

$palabra ="Hola mundo";
$palabra2="hola mundo";
echo strlen($palabra);

echo "<br>";
echo strtolower($palabra);
echo "<br>";
echo strtoupper($palabra);
echo "<br>";
echo strcmp($palabra, $palabra2);
echo "<br>";
echo strcasecmp($palabra, $palabra2);
echo "<br>";
echo substr($palabra, 3,3);
echo "<br>";
//Comprueba dos la primera cadena de texto
//con la segunda, devuelve true o false
echo strpos($palabra,$palabra2);
echo "<br>";


    ?>
    
</body>
</html>