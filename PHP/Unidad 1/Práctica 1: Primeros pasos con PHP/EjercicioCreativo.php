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

        /* Estilos para los contenedores de los enfrentamientos */
        .enfrentamiento {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <h1>Enfrentamientos de Dragon Ball</h1>

    <?php
    // Array asociativo con personajes, su vida y habilidades
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

    function agruparPersonajes($personajes) {
        $nombres = array_keys($personajes); 
        shuffle($nombres); 
        $grupos = []; 

        for ($i = 0; $i < count($nombres); $i += 2) {
            if (isset($nombres[$i + 1])) {
                $grupos[] = [$nombres[$i], $nombres[$i + 1]]; 
            } else {
                $grupos[] = [$nombres[$i]]; 
            }
        }

        return $grupos; 
    }

    function enfrentamientosPersonajes($grupos, &$personajes) {
        echo "<h2>Resultados de los Enfrentamientos:</h2>";
        $ganadores = []; 

        foreach ($grupos as $grupo) {
            echo "<div class='enfrentamiento'>";
            if (count($grupo) == 2) {
                $personaje1 = $grupo[0];
                $personaje2 = $grupo[1];

                echo "<h3>$personaje1 VS $personaje2</h3>";

                $vidaPersonaje1 = $personajes[$personaje1]["vida"];
                $vidaPersonaje2 = $personajes[$personaje2]["vida"];

                while ($vidaPersonaje1 > 0 && $vidaPersonaje2 > 0) {
                  
                    $vidaPersonaje2 -= $personajes[$personaje1]["fuerza"];
                    
                    if ($vidaPersonaje2 > 0) {
                        echo "<p><strong>$personaje1</strong> utiliza {$personajes[$personaje1]["tecnica"]} y hace {$personajes[$personaje1]['fuerza']} puntos de daño a $personaje2</p>";
                    } else {
                        echo "<p><strong>$personaje1</strong> usa {$personajes[$personaje1]["tecnica"]} y elimina a $personaje2</p>";
                        $ganadores[] = $personaje1; 
                        break;
                    }

                    $vidaPersonaje1 -= $personajes[$personaje2]["fuerza"];
                    
                    if ($vidaPersonaje1 > 0) {
                        echo "<p><strong>$personaje2</strong> contraataca con {$personajes[$personaje2]["tecnica"]} y hace {$personajes[$personaje2]['fuerza']} puntos de daño a $personaje1</p>";
                    } else {
                        echo "<p><strong>$personaje2</strong> usa {$personajes[$personaje2]["tecnica"]} y elimina a $personaje1</p>";
                        $ganadores[] = $personaje2; 
                        break;
                    }
                }
            } else {
               
                $personaje1 = $grupo[0];
                echo "<p><strong>$personaje1</strong> no tiene oponente, pasa automáticamente a la siguiente ronda.</p>";
                $ganadores[] = $personaje1;
            }
            echo "</div>"; 
        }

        return $ganadores; 
    }

    
    $ronda = 1;
    while (count($personajes) > 1) {
        echo "<h2>Ronda $ronda</h2>";
        $gruposDePersonajes = agruparPersonajes($personajes); 
        $ganadores = enfrentamientosPersonajes($gruposDePersonajes, $personajes); 
        
        $personajes = array_intersect_key($personajes, array_flip($ganadores));
        $ronda++;
    }

    $ganadorFinal = array_keys($personajes)[0];
    echo "<h1>El ganador final es <strong>$ganadorFinal</strong>!</h1>";
    ?>

</body>

</html>

