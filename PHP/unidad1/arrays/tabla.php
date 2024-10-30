<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Multiplicar</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #F5F5DC;
        }
        th, td {
            border: 1px solid #000;
            text-align: center;
            padding: 10px;
        }
        th {
            background-color: #2e8b57;
            color: white;
        }
        .header-left {
            background-color: #2e8b57;
            color: white;
        }
        .encabezado-x {
            background-color: #00FFFF;
        }
    </style>
</head>
<body>

<table>
    <tr>
        <th class="encabezado-x">X</th>
        <?php
        // Crear el encabezado de la fila (0-9)
        for ($i = 0; $i <= 9; $i++) {
            echo "<th>$i</th>";
        }
        ?>
    </tr>
    <?php
    for ($row = 0; $row <= 9; $row++) {
        echo "<tr>";
        echo "<th class='header-left'>$row</th>";
        
        // Celdas de los productos
        for ($col = 0; $col <= 9; $col++) {
            $product = $row * $col;
            echo "<td>$product</td>";
        }
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>