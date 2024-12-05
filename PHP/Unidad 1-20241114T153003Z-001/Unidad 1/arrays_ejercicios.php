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
echo "<p>" . implode(",", $aleatorios) . "</p>";

$suma = array_sum($aleatorios);

$media = $suma / count($aleatorios);

$maximo = max($aleatorios);
$minimo = min($aleatorios);

echo "<p>La suma de todos los elementos es: $suma</p>";
echo "<p>La media aritmética es: $media</p>";
echo "<p>El valor máximo es: $maximo</p>";
echo "<p>El valor mínimo es: $minimo</p>";


$maximo = $aleatorios[0];
$minimo = $aleatorios[0];

foreach ($aleatorios as $numero) {
    if ($numero > $maximo) {
        $maximo = $numero;
    }
    echo "<p>El valor máximo es: $maximo</p>";

    if ($numero < $minimo) {
        $minimo = $numero;
    }
    $suma = 0;
    foreach ($aleatorios as $numero) {
        $suma += $numero; // Sumar cada número al total
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
echo "<tr><th>Mes</th><th>Temperatura Máxima (°C)</th></tr>";
foreach ($temperaturasMadrid2023 as $mes => $temperatura) {
    echo "<tr><td>$mes</td><td>$temperatura</td></tr>";
}
echo "</table>";
?>

<h2>EJERCICIO 6</h2>

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
echo "<tr><th>Mes</th><th>Gráfica de Temperatura</th></tr>";

foreach ($temperaturasMadrid2023 as $mes => $temperatura) {
    // Crear la gráfica simulada
    $graficatemp = str_repeat('-', (int)$temperatura);
    
    // Ajustar para que se muestre solo la parte entera
    $temperaturaDisplay = (int)$temperatura;
    
    echo "<tr><td>$mes</td><td>$graficatemp ($temperaturaDisplay°C)</td></tr>";
}

echo "</table>";
?>


<h2>EJERCICIO 7</h2>

<?php
// Array asociativo bidimensional con temperaturas
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

// Mostrar la tabla
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

<h2>EJERCICIO 8</h2>

<?php
// Definición de los palos y números de la baraja
$palos = ["oros", "copas", "espadas", "bastos"];
$numeros = [1, 2, 3, 4, 5, 6, 7, 10, 11, 12]; // 10, 11, 12 son las figuras (sota, caballo, rey)

// Mapa de puntos según las cartas
$puntos = [
    "1" => 11,  // As
    "3" => 10,  // Tres
    "10" => 2,  // Sota
    "11" => 3,  // Caballo
    "12" => 4,  // Rey
];

// Generar la baraja completa
$baraja = [];
foreach ($palos as $palo) {
    foreach ($numeros as $numero) {
        $nombreCarta = ($numero <= 7) ? (string)$numero : ($numero == 10 ? "sota" : ($numero == 11 ? "caballo" : "rey"));
        $baraja[] = "$nombreCarta de $palo";
    }
}

// Barajar la baraja
shuffle($baraja);

// Escoger 10 cartas al azar
$cartasEscogidas = array_slice($baraja, 0, 10);

// Calcular los puntos
$totalPuntos = 0;
foreach ($cartasEscogidas as $carta) {
    // Obtener el número de la carta
    $partes = explode(" ", $carta);
    $nombreCarta = $partes[0];
    
    // Obtener los puntos de la carta
    if (isset($puntos[$nombreCarta])) {
        $totalPuntos += $puntos[$nombreCarta];
    }
}

// Mostrar las cartas escogidas y el total de puntos
echo "Cartas escogidas: <br>";
foreach ($cartasEscogidas as $carta) {
    echo $carta . "<br>";
}
echo "<br>Total de puntos: $totalPuntos";
?>

<h2>EJERCICIO 9</h2>

<?php

// Definición de los palos y números de la baraja
$palos = ["oros", "copas", "espadas", "bastos"];
$numeros = [1, 2, 3, 4, 5, 6, 7, 10, 11, 12]; // 10, 11, 12 son las figuras (sota, caballo, rey)

// Mapa de puntos según las cartas
$puntos = [
    "1" => 11,  // As
    "3" => 10,  // Tres
    "10" => 2,  // Sota
    "11" => 3,  // Caballo
    "12" => 4,  // Rey
];

// Generar la baraja completa
$baraja = [];
foreach ($palos as $palo) {
    foreach ($numeros as $numero) {
        // Asignación de nombre de carta sin usar operador ternario
        if ($numero <= 7) {
            $nombreCarta = (string)$numero;
        } elseif ($numero == 10) {
            $nombreCarta = "sota";
        } elseif ($numero == 11) {
            $nombreCarta = "caballo";
        } else { // $numero debe ser 12
            $nombreCarta = "rey";
        }
        $baraja[] = "$nombreCarta de $palo";
    }
}

// Barajar la baraja
shuffle($baraja);

// Escoger 10 cartas al azar sin repetición
$cartasEscogidas = array_slice($baraja, 0, 10); // Selecciona las primeras 10 cartas de la baraja barajada

// Calcular los puntos
$totalPuntos = 0;
foreach ($cartasEscogidas as $carta) {
    // Obtener el número de la carta
    $partes = explode(" ", $carta);
    $nombreCarta = $partes[0];
    
    // Obtener los puntos de la carta
    if (isset($puntos[$nombreCarta])) {
        $totalPuntos += $puntos[$nombreCarta];
    }
}

// Mostrar las cartas escogidas y el total de puntos
echo "Cartas escogidas: <br>";
foreach ($cartasEscogidas as $carta) {
    echo $carta . "<br>";
}
echo "<br>Total de puntos: $totalPuntos";

?>

<h2>EJERCICIO 10</h2>

<?php
// Minidiccionario castellano-inglés
$diccionario = [
    "hola" => "hello",
    "gracias" => "thank you",
    "adiós" => "goodbye",
    "por favor" => "please",
    "sí" => "yes",
    "no" => "no",
    "buenos días" => "good morning",
    "buenas noches" => "good night",
    "por supuesto" => "of course",
    "¿cómo estás?" => "how are you?",
];

// Seleccionar una palabra aleatoria en castellano
$palabrasCastellano = array_keys($diccionario);
$palabraAleatoria = $palabrasCastellano[array_rand($palabrasCastellano)];

// Obtener la traducción en inglés
$traduccionIngles = $diccionario[$palabraAleatoria];

// Mostrar la palabra y su traducción
echo "Palabra en castellano: $palabraAleatoria <br>";
echo "Traducción al inglés: $traduccionIngles";
?>

<h2>EJERCICIO 11</h2>
<?php
// Crear un array para almacenar los números únicos
$numeros = [];

// Generar números aleatorios únicos entre 0 y 500
while (count($numeros) < 100) {
    $numeroAleatorio = rand(0, 500);
    if (!in_array($numeroAleatorio, $numeros)) {
        $numeros[] = $numeroAleatorio;
    }
}

// Crear el array bidimensional de 10x10
$arrayBidimensional = [];
for ($i = 0; $i < 10; $i++) {
    $arrayBidimensional[$i] = array_slice($numeros, $i * 10, 10); // Tomar 10 números por fila
}

// Imprimir el contenido del array bidimensional en una tabla
echo "<table border='1' cellpadding='5' cellspacing='0'>";
for ($i = 0; $i < 10; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 10; $j++) {
        echo "<td>{$arrayBidimensional[$i][$j]}</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>


    
</body>
</html>