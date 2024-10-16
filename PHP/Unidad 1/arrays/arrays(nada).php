<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$aleatorios =[];

for ($i=0; $i < 20; $i++) { 
$aleatorios []=rand(10, 50);
}
    echo "<p>";

    for ($i=0; $i <count($aleatorios) ; $i++) { 
        if ($i == count($aleatorios) -1 ) {
            echo $aleatorios[$i];
            } else {
                echo $aleatorios[$i] . " , ";

        }
    }
   
    echo "</p>";
?>

<?php

$sumatoria=0;
$maximo = $aleatorios[0];
$minimo= $aleatorios[0];
foreach ($aleatorios as $valor) {
    $sumatoria+=  $valor;
    if ($maximo < $valor) {
        $maximo = $valor;
        
    }
    if ($minimo > $valor) {
        $minimo = $valor;
    
    }

}
    echo  "<p> Valor: $valor</p>";
    echo  "<p> Maximo: $maximo</p>";
    echo  "<p> Minimo: $minimo</p>";


?>

<?php

$suma = 0;
$personas = [
    "Juan" => 1.75,
    "Ana" => 1.65,
    "Luis" => 1.80,
    "María" => 1.70,
    "Pedro" => 1.60
];

echo "<table border ='1'>
<tr>
<th>Nombre</th>
<th>Altura</th>
</tr>";

foreach ($personas as $nombre => $altura) {
    echo "<tr>
    <td>$nombre</td>
    <td>$altura</td>
    </tr>";   
    $suma += $altura;

}

$numPersonas = count($personas);
$media = $suma/$numPersonas;

echo "<tr>
<th>Altura media </th>
<td>$media</td>
</tr>
</table>";

?>

<br>

<?php
$numeros = [];
$cuadrados = [];
$cubos = [];

for ($i = 0; $i < 10; $i++) {
    $numeros[] = rand(0, 100); 
}

// Calcular cuadrados y cubos
foreach ($numeros as $numero) {
    $cuadrados[] = $numero ** 2; 
    $cubos[] = $numero ** 3;     
}


echo "<table border = '1'>
<tr>
<th>Valor</th>
<th>Cuadrado</th>
<th>Cubo</th>
</tr>";

for ($i=0; $i < 10; $i++) { 
    echo "<tr>
    <td>$numeros[$i]</td>
    <td>$cuadrados[$i]</td>
    <td>$cubos[$i]</td>
    </tr>";
}

echo "</table>";


?>

<br>

<?php

$alumnado = ["Fatima", "Alberto", "Amir", "Sofia"];
$notas = [7.8, 4.1, 6.8, 9.5];
$matriculas = [true, true, false, true];


echo "<ul>";
for ($i = 0; $i < count($alumnado); $i++) {
    $nombre = $alumnado[$i];
    $calificacion = $notas[$i];
    
    // Usar if para determinar si está matriculado
    if ($matriculas[$i]) {
        $matriculado = "sí";
    } else {
        $matriculado = "no";
    }

    echo "<li>$nombre tiene un $calificacion y $matriculado está matriculado.</li>";
}
echo "</ul>";

echo "<ul>";



"</ul>";


?>

    
</body>
</html>