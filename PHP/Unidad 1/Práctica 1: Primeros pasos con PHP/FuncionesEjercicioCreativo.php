<?php
//En este funcion formaremos las alineaciones de los combates
function agruparPersonajes($personajes) {
    $nombres = array_keys($personajes);  //arrays_keys devuelve un array con la claves, en este caso son los nombres de los personajes
    shuffle($nombres); //shuffle barajeara la posicion de los nombres de la array para añadir mas aleatoriedad al combate
    $grupos = []; 

    for ($i = 0; $i < count($nombres); $i += 2) { //agruparemos a los personajes en arrays de dos en dos 
        if (isset($nombres[$i + 1])) { //si hay un numero impar de personajes,  el ultimo grupo solo tenga un personaje
            $grupos[] = [$nombres[$i], $nombres[$i + 1]]; 
        } else {
            $grupos[] = [$nombres[$i]]; 
        }
    }

    return $grupos; 
}
//realizaremos los enfrentamiento
function enfrentamientosPersonajes($grupos, &$personajes) {//pasamos personajes por referencia para poder modificarlo. De lo contrario no podriamos eliminar personajes del array
    echo "<h2>Resultados de los Enfrentamientos:</h2>";
    $ganadores = []; 

    foreach ($grupos as $grupo) {
        echo "<div class='enfrentamiento'>";
        if (count($grupo) == 2) {// con esta condición aseguramos que si hay un personaje sin enfrentar pasa a la siguiente ronda
            $personaje1 = $grupo[0];
            $personaje2 = $grupo[1];//almacenamos la posición de los personajes de la array en una variable, de forma que podamos acceder a los datos

            echo "<h3>$personaje1 VS $personaje2</h3>";

            $vidaPersonaje1 = $personajes[$personaje1]["vida"];
            $vidaPersonaje2 = $personajes[$personaje2]["vida"];

            while ($vidaPersonaje1 > 0 && $vidaPersonaje2 > 0) { //el combate se repetirá hasta que haya un ganador
              
                $vidaPersonaje2 -= $personajes[$personaje1]["fuerza"];
                
                if ($vidaPersonaje2 > 0) {
                    echo "<p><strong>$personaje1</strong> utiliza {$personajes[$personaje1]["tecnica"]} y hace {$personajes[$personaje1]['fuerza']} puntos de daño a $personaje2</p>";
                   $personajes[$personaje1]['fuerza']= rand(0,100); //actualizamos la fuerza para que no haga siempre el mismo daño 
                } else {
                    echo "<p><strong>$personaje1</strong> usa {$personajes[$personaje1]["tecnica"]} y elimina a $personaje2</p>";
                    $ganadores[] = $personaje1; 
                }

                $vidaPersonaje1 -= $personajes[$personaje2]["fuerza"];
                
                if ($vidaPersonaje1 > 0) {
                    echo "<p><strong>$personaje2</strong> contraataca con {$personajes[$personaje2]["tecnica"]} y hace {$personajes[$personaje2]['fuerza']} puntos de daño a $personaje1</p>";
                    $personajes[$personaje2]['fuerza']= rand(0,100);
                } else {
                    echo "<p><strong>$personaje2</strong> usa {$personajes[$personaje2]["tecnica"]} y elimina a $personaje1</p>";
                    $ganadores[] = $personaje2; 
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
