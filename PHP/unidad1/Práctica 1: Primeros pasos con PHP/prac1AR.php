<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>EJERCICIO 1: BUCLES ANIDADOS</h2>
    <h3>Primera figura</h3>

    <?php

    /*Como mi nombre es Aitor Ruiz:
    A: 1 mod 10 + 3 = 4 filas
    R: 20 mod 10 + 3 = 20 columnas */

    $filas = 4;
    $columnas = 20;
   
   for ($i = 0; $i < $filas; $i++) {
       for ($j = 0; $j < $columnas; $j++) {
           echo "* "; 
       }
       echo "<br>";  
   }
   ?>
    
    <h3>Segunda figura</h3>
    <?php
    for ($i = 1; $i <= $filas; $i++) {
        for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br>"; 
    }
    ?>
  
    <h3>Tercera figura</h3>
    <?php

     for ($i = 1; $i <= $filas; $i++) { // Bucle para las 4 filas
         for ($j = 1; $j <= $columnas; $j++) { // Bucle para el número de columnas en la fila actual
             echo "* ";
         }
         $columnas--; // Reducimos en 1 el número de columnas en la siguiente fila
         echo "<br>"; //Y terminada la fila hacemos salto de línea
     }
    ?>
    <h3>Cuarta figura</h3>
    <?php


    for ($i = 0; $i < $filas; $i++) { // Igual que la anterior, lo mismo es $i = 1; $i <= $filas que $i = 0; $i < $filas
        // Añadir espacios al inicio de cada fila según la fila actual
        for ($k = 0; $k < $i; $k++) {
            echo "&nbsp","&nbsp","&nbsp"; // Dejamos el espacios en blanco con el "&nbsp", si hiciesemos " ", no lo reconocería
        }
       
        for ($j = 0; $j < $columnas - $i; $j++) {
            echo "* ";
        }
        echo "<br>";
    }
?>

   
    <h3>Quinta figura</h3>
    <?php
    ?>


<h2>EJERCICIO 2: ARRAYS BIDIMENSIONALES</h2>

<?php
// Primero definiremos las dimensiones de la array. Como tiene 5 filas y 5 columnas:
$filas = 5;
$columnas = 5;

// Vamos a crear la array para rellenarla con números aleatorios
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

// Le damos un valor aleatorio al centro
$valorCentro = rand(-100, 100);

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

<table>
    <?php
  for ($i = 0; $i < $filas; $i++) {
    echo "<tr>"; // Declaramos una nueva fila y con cada iteracion la irá generando el navegador
    for ($j = 0; $j < $columnas; $j++) { //Declaramos una nueva columna
           $class = ""; // Declaramos una clase vacia para utilizarla en el CSS
        if ($i == $j) { //si las posiciones $i y $j son la misma, significan que estan en la diagonal (\)
            $class = "diagonal1"; //coge el color de la propiedad "diagonal1"; (\)
        } elseif ($i + $j == $filas - 1) { //Asi conseguimos una vez revisado que celda de la diagonal (\) este rellena, comprobamos la celda de diagonal (/)
            $class = "diagonal2"; 
            /*Ahora mismo $class almacena 2 valores distintos al mismo tiempo porque el valor dependenderá de si cumple la condición  if ($i == $j)
            o la condición elseif ($i + $j == $filas - 1). Luego en la declaración CSS los distinguirá dandoles un estilo diferente según que condicion se cumpla */
        }

        // De nuevo, verificamos cual es el valor mayor y el menor
        if ($numeros[$i][$j] == $min) {
          //"aplicaremos  "td class=" para indicar que utilizaremos propiedades CSS sobre el valor $class. En este caso se aplicará el valor $class del  if ($i == $j)
            echo "<td class='$class min'>".$numeros[$i][$j]."</td>";
        } elseif ($numeros[$i][$j] == $max) {
            echo "<td class='$class max'>".$numeros[$i][$j]."</td>";//En este otro caso se aplicará el valor $class del elseif ($i + $j == $filas - 1)
        } else {
          
            if ($i == 2 && $j == 2) {  // Con esta condicion haremos referencia a la celda central como si de una coordenada se tratase
                echo "<td class='$class centro'>".$numeros[$i][$j]."</td>"; // Mostrar el valor aleatorio
            } else {
                echo "<td class='$class'>".$numeros[$i][$j]."</td>"; //En este caso se imprimira la celda con la clase $class asignada (diagonal1, diagonal2) con su valor.
            }
        }
    }
    echo "</tr>"; 
}
    ?>
</table>

</body>
</html>
<h2>EJERCICIO 3: FUNCIONES</h2>

<h3>Funcion: filtrar</h3>
<?php
include "./funciones/funcionesAR.php";
/*Al ser una array mas compleja que una cadena de 
strings, en vez de echo, se imprimira con print_r*/
print_r(filtrar([1,2,3,4,5,6,7,8,9], true));
echo "<br>";
print_r(filtrar([3,5,2,4,7,6,7,2,1]), false);
echo "<br>";
print_r(filtrar([], true));
echo "<br>";
print_r(filtrar([3], true));
echo "<br>";
print_r(filtrar([1,2,3,4,5,6,7,8,9]));


?>

<h3>Funcion: sumarNegativos</h3>

<?php

echo sumarNegativos(1,3,5,-6,-4,-8,-3,-8);
echo "<br>";
echo sumarNegativos();
echo "<br>";
echo sumarNegativos(1,2,3,4,5,6,7,8,9);
echo "<br>";

?>

<h3>Funcion: describirPersona</h3>
<?php

$persona1 = [
    "nombre" => "Aitor",
    "edad" => 31,
    "matricula" => true
];
$persona2 = [
    "nombre" => "Lucia",
    "edad" => 19,
    "matricula" => true
];

$persona3 = [
    "nombre" => "Jaime",
    "edad" => 23,
    "matricula" => false
];

echo describirPersona($persona1);
echo "<br>";
echo describirPersona($persona2);
echo "<br>";
echo describirPersona($persona3);
  

?>

<h3>Función: calcularMedias</h3>

<?php
$notas = [
    "Luz" => [7.2, 9.7, 8],
    "Alberto" => [],
    "Juan" => [4.1, 8]
];

$resultado = calcularMedias($notas);
var_dump(value: $resultado);
?>

<h3>Función: verificarAlergenos</h3>
<?php

$listaAlimentos = [
    'leche' => ['lactosa'],
    'nueces' => ['frutos secos'],
    'pan' => ['gluten'],
    'gambas' => ['mariscos'],
    'soja' => ['soja'],
];

echo verificarAlergenos('leche', $listaAlimentos);
echo "<br>";
echo verificarAlergenos('carne', $listaAlimentos);
echo "<br>";
echo verificarAlergenos('nueces', $listaAlimentos);

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

<h2>EJERCICIO 4: ARRAYS ASOCIATIVOS</h2>
<?php
include "./funciones/biblioteca.php";
?>

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

<br>

<h2>EJERCICIO 4.1</h2>

<table>
    <tr>
        <th>Título</th>
        <th>Autoria</th>
        <th>Año</th>
        <th>Antigüedad</th>
        <th>Paginas</th>

    </tr>
    <?php
    foreach ($librosConPaginas as $paginas) {
       
    
        echo "<tr>";
        echo "<td>" . formatear($paginas["titulo"], false) . "</td>";
        echo "<td>" . formatear($paginas["autoria"], true) . "</td>";
        echo "<td>" . $paginas["año"] . "</td>";
        echo "<td>" . antiguedad($paginas["año"]) . " años</td>";
        echo "<td>" . mostrarPaginas($paginas). "</td>";
        echo "</tr>";
    }
    ?>
</table>


</body>
</html>
</body>
</html>