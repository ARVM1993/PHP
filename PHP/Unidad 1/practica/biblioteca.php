<?php

$libros = [
    'libro1' => [
        'titulo' => 'la mala costumbre',
        'autoria' => 'alana s. portero',
        'año' => 2023
    ],
    'libro2' => [
        'titulo' => 'lo que hay',
        'autoria' => 'sara torres',
        'año' => 2022
    ],
    'libro3' => [
        'titulo' => 'las malas',
        'autoria' => 'camila sosa villada',
        'año' => 2019
    ]
];

function formatear($cadenaCaracteres, $booleano) {
    if ($booleano === true) {
        // Divide la cadena en palabras
        $palabras = explode(" ", $cadenaCaracteres);
        foreach ($palabras as &$palabra) {
            // Capitaliza la primera letra de cada palabra
            $palabra[0] = strtoupper($palabra[0]);
        }
        return implode(" ", $palabras); // Junta las palabras
    } elseif ($booleano === false) {
        // Capitaliza solo la primera letra de la cadena completa
        $cadenaCaracteres[0] = strtoupper($cadenaCaracteres[0]);
        return $cadenaCaracteres;
    }

    return $cadenaCaracteres; // Devuelve la cadena original si no se cumple ningún caso
}

function antiguedad($año1, $año2 = null) {
    if ($año2 === null) {
        $añoActual = date("Y");
        $antiguedadLibro = $añoActual - $año1;
    } else {
        $antiguedadLibro = abs($año1 - $año2);
    }
    return $antiguedadLibro;
}

// Itera sobre todos los libros
foreach ($libros as $libro) {
    echo "El libro " . formatear($libro["titulo"], false) . " escrito por " .
        formatear($libro["autoria"], true) . " tiene " .
        antiguedad($libro["año"]) . " años desde su publicación en " . $libro["año"] . ".<br>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Libros</title>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Lista de Libros</h2>

<table>
    <tr>
        <th>Título</th>
        <th>Autoria</th>
        <th>Año</th>
        <th>Antigüedad</th>
    </tr>

    <?php
    foreach ($libros as $libro) {
        echo "<tr>";
        echo "<td>" . formatear($libro["titulo"], false) . "</td>";
        echo "<td>" . formatear($libro["autoria"], true) . "</td>";
        echo "<td>" . $libro["año"] . "</td>";
        echo "<td>" . antiguedad($libro["año"]) . " años</td>";
        echo "</tr>";
    }
    ?>

</table>

</body>
</html>
