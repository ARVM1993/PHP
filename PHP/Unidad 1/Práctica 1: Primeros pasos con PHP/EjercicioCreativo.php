<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enfrentamientos Dragon Ball</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        p{
            text-align: center;
            
            
        }

        h1 {
            text-align: center;
            color: #ffcc00;
            text-shadow: 2px 2px #ff0000;
        }

        h2 {
            color: #ff6600;
            margin-top: 20px;
        }

        h3 {
            color: #cc0000;
        }

        p {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        strong {
            color: #000;
        }

        .enfrentamiento {
            margin-bottom: 30px;
        }
    </style>
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

    require "FuncionesEjercicioCreativo.php";

    $ronda = 1;
    while (count($personajes) > 1) { //mientras haya mas de un personaje se repitan las funciones y eliminen a los que pierden
        echo "<h2>Ronda $ronda</h2>";
        $gruposDePersonajes = agruparPersonajes($personajes); 
        $ganadores = enfrentamientosPersonajes($gruposDePersonajes, $personajes);
        /*array_intersect_key comparará dos arrays asociativos y devolvera las claves,
        mientras que con array_flip cambiará  las claves por los valores de la array de personajes, de forma que el nombre
        de ambasd arrays asociativas sean los mismos, por lo que se pueden comparar directamente*/
        
        $personajes = array_intersect_key($personajes, array_flip($ganadores));
        $ronda++;
    }

    $ganadorFinal = array_keys($personajes)[0]; //finalmente devolverá el valor de la clave del ganador
    echo "<h1>El ganador final es <strong>$ganadorFinal</strong>!</h1>";
    ?>

</body>

</html>

