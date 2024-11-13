<?php
include_once "./funciones/funcAR.php";

echo "<h1>Ejercicio 1</h1>
<br>
<h4>1.1 </h4>
<br>";

$indiceEstudiantes = [
    1=> "Aitor",
    6=>"Lucia",
    3=> "Dani",
    8=> "Valentina"
];

foreach ($indiceEstudiantes as $key => $nombre) {
    if ($key% 2 == 0) {
       echo "La clave es $key y el nombres es $nombre" . "<br>";
       
    }
}

echo "<h4>1.2. </h4>";

echo $division1 = dividir(5,3);
echo "<br>";
echo $division2 = dividir(4);
echo "<br>";
echo $division3 = dividir(3,0);

echo "<br>";

echo "<h4>1.3. </h4>";

echo $concatenar1 = concatenar("a", "b", "c");
echo "<br>";
echo $concatenar2 = concatenar();
echo "<br>";
echo $concatenar3 = concatenar("a", 2);
echo "<br>";

echo "<h4>1.4. </h4>";

$profes = ["DAW" => [
    "Sete" => ["DWES"],
    "Manuel" => ["DWEC", "SSII"],
    "Santi" => ["FOL", "EIE"]]];


foreach ($profes as $grado => $profes) {
    foreach ($profes as $profesor => $asignaturas) {
        echo "<p>$profesor imparte " . implode(" ", $asignaturas) .
        "</p>";
        }
    }

    echo "<br>";

include_once "./clases/Plato.php";
include_once "./clases/Principal.php";
include_once "./clases/Postre.php";

echo "<h2>Ejercicio 2</h2>";

echo $principal1 = new Principal("Hamburguesa", 5, true);
echo "<br>";

echo $principal2 = new Principal("Pollo", 3, false);
echo "<br>";
echo $postre1 = new Postre("Torta", 2, 10);
echo "<br>";
echo $postre2 = new Postre("Flan", 1, 12);
echo "<br>";




