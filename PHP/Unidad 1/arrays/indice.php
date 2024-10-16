<?php

$palos = ['Oros', 'Copas', 'Espadas', 'Bastos'];
$cartas = [1, 2, 3, 4, 5, 6, 7, 10, 11, 12];
$puntos = [
    1 => 11,
    3 => 10,
    10 => 2,
    11 => 3,
    12 => 4
];

$cartasElegidas = [];
$palosElegidos = [];
$sumaPuntos = 0;

for ($i = 0; $i < 10; $i++) {
    $cartaAleatoria = rand(0, 9); //$cartaAleatorio = integer
    $paloAleatorio = rand(0, 3); //$paloAleatorio = integer

    $carta = $cartas[$cartaAleatoria]; //$carta= int
    $palo = $palos[$paloAleatorio]; //$palo = string

    $contador = 0;
    while ($contador < count($cartasElegidas)) { //cartasElegidas: se inician en 0
        if ($cartasElegidas[$contador] == $carta && $palosElegidos[$contador] == $palo) {
            $cartaAleatoria = rand(0, 9);
            $paloAleatorio = rand(0, 3);

            $carta = $cartas[$cartaAleatoria]; //$carta= int
            $palo = $palos[$paloAleatorio]; //$palo = string

            $contador--;
        
        } else {
            $contador++;
        }
    }

    $cartasElegidas[] = $carta;
    $palosElegidos[] = $palo;

    echo $carta . " de " . $palo . "<br>";
}

foreach ($cartasElegidas as $cartaElegida) {
    if (isset($puntos[$cartaElegida])) {
        $sumaPuntos += $puntos[$cartaElegida];
    }
}

echo "La suma de los puntos es: " . $sumaPuntos . "<br>";

?>
