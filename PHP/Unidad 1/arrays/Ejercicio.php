<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<H2>Ejercicio 1</H2>
<?php

$aleatorios = [];
for ($i = 0; $i < 20; $i++) {
    $aleatorios[] = rand(10, 50);
}

echo "<p>";
for ($i = 0; $i < count($aleatorios); $i++) {
    if ($i == count($aleatorios) - 1) {
        echo $aleatorios[$i];
    } else {
        echo $aleatorios[$i] . ", ";
    }
}
echo "</p>";

$maximo = $aleatorios[0];
$minimo = $aleatorios[0];

foreach ($aleatorios as $numero) {
    if ($numero > $maximo) {
        $maximo = $numero;
    }

    if ($numero < $minimo) {
        $minimo = $numero;
    }
    $suma = 0;
    foreach ($aleatorios as $numero) {
        $suma += $numero; 
    }
}


// Mostrar el valor máximo y mínimo
echo "<p>El valor máximo es: $maximo</p>";
echo "<p>El valor mínimo es: $minimo</p>";
echo "<p>El valor mínimo es: $suma</p>";

?>


<h2>EJERCICIO 2</h2>
<?php
// Array asociativo que almacena nombres y alturas
$personas = [
    "Juan" => 1.75,
    "Ana" => 1.65,
    "Luis" => 1.80,
    "María" => 1.70,
    "Pedro" => 1.60
];

// Calcular la altura media
$sumaAlturas = 0;
$numPersonas = count($personas);

foreach ($personas as $altura) {
    $sumaAlturas += $altura;
}

$alturaMedia = $sumaAlturas / $numPersonas;

// Generar tabla HTML
echo "<table border='1'>";
echo "<tr>
<th>Nombre</th>
<th>Altura (m)</th>
</tr>";

foreach ($personas as $nombre => $altura) {
    echo "<tr>
    <td>$nombre</td>
    <td>$altura</td>
    </tr>";
}

// Añadir fila con la altura media
echo "<tr>
<td><strong>Altura Media</strong></td>
<td><strong>" . number_format($alturaMedia, 2) . "</strong></td>
</tr>";
echo "</table>";
?>

<h2>EJERCICIO 3</h2>
<?php
// Inicializar los arrays
$numeros = [];
$cuadrados = [];
$cubos = [];

// Llenar el array 'numeros' con valores aleatorios entre 0 y 100
for ($i = 0; $i < 10; $i++) {
    $numeros[] = rand(0, 100); // Genera un número aleatorio
}

// Calcular cuadrados y cubos
foreach ($numeros as $numero) {
    $cuadrados[] = $numero ** 2; // Calcula el cuadrado
    $cubos[] = $numero ** 3;      // Calcula el cubo
}

// Generar la tabla HTML
echo "<table border='1'>";
echo "<tr>
<th>Valor</th>
<th>Cuadrado</th>
<th>Cubo</th>
</tr>";

for ($i = 0; $i < 10; $i++) {
    echo "<tr>
    <td>{$numeros[$i]}</td>
    <td>{$cuadrados[$i]}</td>
    <td>{$cubos[$i]}</td>
    </tr>";
}

echo "</table>";
?>
<h2>EJERCICIO 4</h2>
<?php
// Inicializar los arrays
$alumnado = ["Fatima", "Alberto", "Amir", "Sofia"];
$notas = [7.8, 4.1, 6.8, 9.5];
$matriculas = [true, true, false, true];

// Generar la lista no ordenada
echo "<ul>";
for ($i = 0; $i < count($alumnado); $i++) {
    $nombre = $alumnado[$i];
    $nota = $notas[$i];
    
    // Usar if para determinar si está matriculado
    if ($matriculas[$i]) {
        $matriculado = "sí";
    } else {
        $matriculado = "no";
    }

    echo "<li>$nombre tiene un $nota y $matriculado está matriculado.</li>";
}
echo "</ul>";
?>

<h2>EJERCICIO 5</h2>
<?php
// Array asociativo con las temperaturas máximas en Madrid 2023
$temperaturasMadrid2023 = array(
    "Enero" => 14.8,
    "Febrero" => 19.0,
    "Marzo" => 25.2,
    "Abril" => 30.9,
    "Mayo" => 29.1,
    "Junio" => 37.0,
    "Julio" => 38.7,
    "Agosto" => 40.0,
    "Septiembre" => 31.6,
    "Octubre" => 30.1,
    "Noviembre" => 18.6,
    "Diciembre" => 13.1
);

// Imprimir la tabla
echo "<table border='1'>";
echo "<tr>
<th>Mes</th>
<th>Temperatura Máxima (°C)</th>
</tr>";
foreach ($temperaturasMadrid2023 as $mes => $temperatura) {
    echo "<tr>
    <td>$mes</td>
    <td>$temperatura</td>
    </tr>";
}
echo "</table>";
?>

<h2>EJERCICIO 6</h2>
<?php
$temperaturasMadrid2023 = array(
    "Enero" => 14.8,
    "Febrero" => 19.0,
    "Marzo" => 25.2,
    "Abril" => 30.9,
    "Mayo" => 29.1,
    "Junio" => 37.0,
    "Julio" => 38.7,
    "Agosto" => 40.0,
    "Septiembre" => 31.6,
    "Octubre" => 30.1,
    "Noviembre" => 18.6,
    "Diciembre" => 13.1
);

echo "<table border='1'>";
echo "<tr>
<th>Mes</th>
<th>Gráfica de Temperatura</th>
</tr>";

foreach ($temperaturasMadrid2023 as $mes => $temperatura) {
    $graficaTemperatura = '';
    for ($i = 0; $i < $temperatura; $i++) {
        $graficaTemperatura = $graficaTemperatura . '-';
    }
        
    echo "<tr>
    <td>$mes</td>
    <td>$graficaTemperatura ($temperatura)</td>
    </tr>";
}

echo "</table>";
?>


<h2>EJERCICIO 7</h2>

<?php
$temperaturas = [
    "Enero" => [14.8, -1.8],
    "Febrero" => [19, -1.8],
    "Marzo" => [25.2, -1.6],
    "Abril" => [30.9, 5.1],
    "Mayo" => [29.1, 8.3],
    "Junio" => [37, 13.4],
    "Julio" => [38.7, 17.4],
    "Agosto" => [40, 15.1],
    "Septiembre" => [31.6, 10.7],
    "Octubre" => [30.1, 7.5],
    "Noviembre" => [18.6, 3],
    "Diciembre" => [13.1, -0.2],
];

echo "<table border='1'>";
echo "<tr>
<th>Mes</th>
<th>Máx</th>
<th>Min</th>
</tr>";

foreach ($temperaturas as $mes => $valores) {
    echo "<tr>";
    echo "<td>$mes</td>";
    echo "<td>{$valores[0]}</td>";
    echo "<td>{$valores[1]}</td>";
    echo "</tr>";
}

echo "</table>";
?>

<br>
<h2>EJERCICIO 9</h2>
<?php

$cartasDeLaBaraja = [1, 2, 3, 4, 5, 6, 7, 10, 11, 12];
$palosDeLaBaraja = ['Oros', 'Copas', 'Espadas', 'Bastos'];
$puntos = [
    1 => 11,
    3 => 10,
    2,4,5,6,7=>0,
    10 => 2,
    11 => 3,
    12 => 4
];

$cartasElegidas = [];
$palosElegidos = [];
$sumaPuntos = 0;

for ($i = 0; $i < 10; $i++) {
    //2, 4, 5,   2
    $cartaAleatoria = rand(0, 9); //$cartaAleatorio = integer
    //0, 2, 1,   0
    $paloAleatorio = rand(0, 3); //$paloAleatorio = integer
    //3, 5, 6    3
    $carta = $cartasDeLaBaraja[$cartaAleatoria]; //$carta= int
    //Oros, Espadas, Copas,     Oros
    $palo = $palosDeLaBaraja[$paloAleatorio]; //$palo = string

    $contador = 0;
    while ($contador < count($cartasElegidas)) { //cartasElegidas: se inician en 0
        if ($cartasElegidas[$contador] == $carta && $palosElegidos[$contador] == $palo) { //contador (0 accedera a la primera posicion de la array)
            $cartaAleatoria = rand(0, 9);
            $paloAleatorio = rand(0, 3);

            $carta = $cartasDeLaBaraja[$cartaAleatoria]; //$carta= int
            $palo = $palosDeLaBaraja[$paloAleatorio]; //$palo = string

            $contador=0;
        
        } else {
            $contador++;
        }
    }

    $cartasElegidas[] = $carta;//[3, 5, 6, , , , , , , ]
    $palosElegidos[] = $palo;//[Oros, Espadas, Copas, , , , , , , ]

    echo $carta . " de " . $palo . "<br>";
}

foreach ($cartasElegidas as $cartaElegida) {
        $sumaPuntos += $puntos[$cartaElegida];
    }


echo "La suma de los puntos es: " . $sumaPuntos . "<br>";

?>

</body>
</html>