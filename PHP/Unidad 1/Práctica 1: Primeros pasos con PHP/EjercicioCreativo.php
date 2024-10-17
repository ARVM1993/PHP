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
            padding: 0;
        }
        table {
            width: 50%;
            margin: 50px auto;
            border-collapse: collapse;
            background-color: white;
        }
        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f4b400;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Enfrentamientos de Dragon Ball</h1>

    <?php
    // Array asociativo con personajes, su vida y habilidades
    $personajes = [
        "Goku" => ["vida" => 100, "habilidades" => "Kamehameha"],
        "Vegeta" => ["vida" => 100, "habilidades" => "Final Flash"],
        "Gohan" => ["vida" => 90, "habilidades" => "Masenko"],
        "Piccolo" => ["vida" => 80, "habilidades" => "Special Beam Cannon"],
        "Trunks" => ["vida" => 85, "habilidades" => "Burning Attack"],
        "Frieza" => ["vida" => 100, "habilidades" => "Death Beam"]
    ];

    // Función para comprobar si los personajes están al mismo nivel de vida
    function mismoNivel($p1, $p2, $personajes) {
        return $personajes[$p1]["vida"] == $personajes[$p2]["vida"];
    }

    // Función para generar enfrentamientos aleatorios si están al mismo nivel
    function generarEnfrentamientos($personajes) {
        $nombres = array_keys($personajes);
        shuffle($nombres); // Mezclar personajes aleatoriamente

        $enfrentamientos = [];
        for ($i = 0; $i < count($nombres) - 1; $i += 2) {
            $p1 = $nombres[$i];
            $p2 = $nombres[$i + 1];

            // Comprobar si están al mismo nivel de vida antes de enfrentarlos
            if (mismoNivel($p1, $p2, $personajes)) {
                $enfrentamientos[] = [$p1, $p2];
            }
        }

        return $enfrentamientos;
    }

    // Generar enfrentamientos
    $enfrentamientos = generarEnfrentamientos($personajes);
    
    // Mostrar enfrentamientos en una tabla
    if (count($enfrentamientos) > 0) {
        echo "<table>";
        echo "<tr><th>Personaje 1</th><th>VS</th><th>Personaje 2</th></tr>";
        foreach ($enfrentamientos as $enfrentamiento) {
            echo "<tr><td>{$enfrentamiento[0]}</td><td>VS</td><td>{$enfrentamiento[1]}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align: center;'>No hay enfrentamientos disponibles con personajes del mismo nivel.</p>";
    }
    ?>
</body>
</html>
