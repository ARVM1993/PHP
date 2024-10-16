<?php
// Primero definiremos las dimensiones de la array. Como tiene 5 filas y 5 columnas:
$filas = 5;
$columnas = 5;

// Vamos a crear la array y procedemos a rellenarla con números aleatorios
$numeros = [];
 // Inicializar $min con un número aleatorio y después igualaremos $max para que haga lo mismo
$min = rand(-100, 100);
$max = $min;

//Una vez creada la array y definidos los numeros aleatorios, procedemos a generarlos por medio de un for

for ($i = 0; $i < $filas; $i++) {
    for ($j = 0; $j < $columnas; $j++) {
        $numeros[$i][$j] = rand(-100, 100); // Utilizamos [$i][$j] como si fuese una coordenada de ordenadas y abcisas para dar valor a cada celda
        
        if ($numeros[$i][$j] < $min) { //Para hallar el minimo comparamos los valores de las celdas con $min, si se cumple la condición, la varible se actualiza 
            $min = $numeros[$i][$j];
        }

        if ($numeros[$i][$j] > $max) {// Hacemos que la anterior pero para hallar el valor maximo
            $max = $numeros[$i][$j]; 
        }
    }
}

// Calcular el valor del centro
$valorCentro = rand(-100, 100);

// Imprimir la tabla HTML
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Números Aleatorios</title>
    <link rel="stylesheet" href="../estilos/estiloEj2.css">
</head>
<body>
    <h2>Ejercicio 2: Arrays bidimensionales</h2>

<table>
    <?php
  for ($i = 0; $i < $filas; $i++) {
    echo "<tr>"; // Declramos una nueva fila
    for ($j = 0; $j < $columnas; $j++) { //Declramos una nueva columna
           $class = ""; // Declaramos una clase vacia para utilizarla en el CSS
        if ($i == $j) { //si la posicion de $i y $j es la misma, significan que estan en la diagonal (\)
            $class = "diagonal1"; //coge el color de la propiedad "diagonal1"; (\)
        } elseif ($i + $j == $filas - 1) { //Asi conseguimos una vez revisado que celda de la diagonal (\) este rellena, comprobamos la celda de diagonal (/)
            $class = "diagonal2"; 
        }

        // De nuevo, verificamos cual es el valor mayor y el menor
        if ($numeros[$i][$j] == $min) {
          //"aplicaremos  "td class=" para indicar que utilizaremos propiedades CSS
            echo "<td class='$class min'>".$numeros[$i][$j]."</td>";
        } elseif ($numeros[$i][$j] == $max) {
            echo "<td class='$class max'>".$numeros[$i][$j]."</td>";
        } else {
          
            if ($i == 2 && $j == 2) {  // Con esta condicion haremos referencia a la celda central como si de una coordenada se tratase
                echo "<td class='$class centro'>".$numeros[$i][$j]."</td>"; // Mostrar el valor aleatorio
            } else {
                echo "<td class='$class'>".$numeros[$i][$j]."</td>";
            }
        }
    }
    echo "</tr>"; 
}
    ?>
</table>

</body>
</html>
