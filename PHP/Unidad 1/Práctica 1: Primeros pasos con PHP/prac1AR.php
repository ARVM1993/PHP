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

   
   for ($i = 0; $i < 3; $i++) {
       for ($j = 0; $j < 12; $j++) {
           echo "* "; 
       }
       echo "<br>";  
   }
   ?>
    
    <h3>Segunda figura</h3>
    <?php
    for ($i = 1; $i <= 3; $i++) {
        for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br>"; 
    }
    ?>
   
   
    <h3>Tercera figura</h3>
    <?php
  

    for ($i = 12; $i >= 10; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            echo "* ";
        }
        echo "<br>";
    }
    ?>
    
  

    <h3>Cuarta figura</h3>
    <?php
    for ($i = 12; $i >= 10; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            echo "* ";
        }

        
        echo "<br>";
    }
    ?>
    <h3>Quinta figura</h3>
    <?php

 for ($i = 0; $i < 3; $i++) { 
    for ($j = 0; $j < 12; $j++) { 
        if ($i < $j) {
            echo "*";  
        } else {
            echo " "; 
        }
    }
    echo "<br>";  
}
    
    ?>
    <h3>Sexta figura</h3>
    <?php

    ?>

<h2>EJERCICIO 3: FUNCIONES</h2>

<h3>Funcion: filtrar</h3>
<?php
include "./funcionesAR.php";
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

<h2>Lista de Libros</h2>
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
        echo "<td>" . imprimirLibros($paginas). "</td>";
        echo "</tr>";
    }
    ?>
</table>


    
</body>
</html>
</body>
</html>