<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulacro</title>
</head>

<body>

    <h2>Ejercicio 1</h2>
    <?php
    $array = [
        3 => "tres",
        5 => "c",
        6 => "s",
        8 => "o"
    ];
    foreach ($array as $clave => $valor) {
        if ($clave % 2 == 0) {
            echo "$clave - $valor";
        }
    }

    include "./funciones/funcAR.php";
    var_dump(dividir(5.1, 3));
    var_dump(dividir(5.4));
    var_dump(dividir(5.9, 0));

    echo concatenar("a", "b", "c");

    $profes = ["DAW" => [
                    "Sete" => ["DWES"],
                    "Manuel" => ["DWEC", "SSII"],
                    "Santi" => ["FOL", "EIE"]
        ]];
    
    $daw = $profes["DAW"];
    //var_dump($daw);
    foreach ($daw as $profe => $asignaturas){
        echo "<p>$profe imparte ";
        foreach($asignaturas as $a){
            echo "$a, ";
        }
        echo "</p>";
    }

    //foreach($profes["DAW"])
    ?>

    <h2>Ejercicio 2</h2>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Gluten</th>
        </tr>
        <?php

        require "./clases/Plato.php";
        require "./clases/Principal.php";

        $p1 = new Principal("Sopa", 15.3, true);
        $p2 = new Principal("Ensalada", 14.7, false);
        $platos[] = $p1;
        $platos[] = $p2;

        foreach ($platos as $p) {
            echo "<tr>
                <td>" . $p->getNombre() . "</td>
                <td>{$p->getPrecio()}</td>";
            if ($p->getGluten()) {
                echo "<td>Sí</td>";
            } else {
                echo "<td>No</td>";
            }
            echo "</tr>";
        }
        /*
        echo "<tr>
            <td>" . $p1->getNombre() . "</td>
            <td>{$p1->getPrecio()}</td>";
            if ($p1->getGluten()) {
                echo "<td>Sí</td>";
            } else {
                echo "<td>No</td>";
            }
        echo "</tr>";

        echo "<tr>
            <td>" . $p2->getNombre() . "</td>
            <td>{$p2->getPrecio()}</td>";
            if ($p2->getGluten()) {
                echo "<td>Sí</td>";
            } else {
                echo "<td>No</td>";
            }
        echo "</tr>";*/
        ?>
    </table>
</body>

</html>