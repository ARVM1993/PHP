<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enfrentamientos Dragon Ball</title>
    <link rel="stylesheet" href="estilos/hoja.css">
  
</head>

<body>
    <p>¡BIENVENIDOS AL TORNEO DE CAMPEONES!
        Con motivo del estreno del Sparking Zero realizaremos un combate de exhibición en PHP que sirva de presentación.
        Para realizar este torneo primero almacenaremos a los luchadores en un array asociativo con todos sus datos. 
        Posteriormente pasaremos a formar las alineaciones para que a continuación se lancen al combate, eliminandose en rondas
        y actualizando el resultado hasta que solo quede un campeón. Muy importante que TODO EL PROCESO esté automátizado e ideado
        para que no haya que modificar ni una sola lÍnea de código en caso de añadir o eliminarse a cualquier luchador de la array.
        Dicho lo cual ¡QUE EMPIECE EL TORNEO!
    </p>
    <h1>Enfrentamientos de Dragon Ball</h1>

    
    <?php
    /* Empezamos definiendo un array asociativo bidimensional con los luchadores donde el nombre 
    del luchador es la clave y el valor es otro array asociativo con sus datos*/
    $personajes = [
        "Goku" => ["vida" => 200, "fuerza" => rand(0, 100), "tecnica" => "Kamehameha"],
        "Vegeta" => ["vida" => 200, "fuerza" => rand(0, 100), "tecnica" => "Big Bang"],
        "Gohan" => ["vida" => 200, "fuerza" => rand(0, 100), "tecnica" => "Masenko"],
        "Piccolo" => ["vida" => 200, "fuerza" => rand(0, 100), "tecnica" => "Special Beam Cannon"],
        "Trunks" => ["vida" => 200, "fuerza" => rand(0, 100), "tecnica" => "Burning Attack"],
        "Freezer" => ["vida" => 200, "fuerza" => rand(0, 100), "tecnica" => "Rayo de la muerte"],
        "Cell" => ["vida" => 200, "fuerza" => rand(0, 100), "tecnica" => "Kamehameha perfecto"],
        "Bu" => ["vida" => 200, "fuerza" => rand(0, 100), "tecnica" => "Destruccion Planetaria"],
    ];

    require "funciones/funcionesEjercicioCreativo.php";

    $ronda = 1;
    while (count($personajes) > 1) { //mientras haya mas de un personaje se repitan las funciones y eliminen a los que pierden
        echo "<h2>Ronda $ronda</h2>";
        $gruposDePersonajes = agruparPersonajes($personajes); 
        $ganadores = enfrentamientosPersonajes($gruposDePersonajes, $personajes);
        /*array_intersect_key comparará dos arrays asociativos y devolvera las claves,
        mientras que con array_flip cambiará  las claves por los valores de la array de personajes, de forma que el nombre
        de ambas arrays asociativas sean los mismos, por lo que se pueden comparar directamente*/
        
        $personajes = array_intersect_key($personajes, array_flip($ganadores));
        $ronda++;
    }

    $ganadorFinal = array_keys($personajes)[0]; //finalmente devolverá el valor de la clave del ganador
    echo "<h1>El ganador final es <strong>$ganadorFinal</strong>!</h1>";
    ?>

</body>

</html>

