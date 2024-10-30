<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

function imprimeCapitales($capitales = array()){
    $contador = 0; 
    $total = count($capitales);
    
    foreach ($capitales as $ciudad) {
        $contador++;
        if ($contador == $total) {
            echo "$ciudad."; 
        } else {
            echo "$ciudad, ";
        }
    }
    
}
$capitales = array(
    "Francia" => "Marsella",
    "Italia" => "Roma", 
    "Yemen" => "Sanah",
    "Mongolia" => "Ulan Bator"
);
imprimeCapitales($capitales);

?>

<br>
<?php


function imprimeArray($array){
    foreach ($array as $valor) {
        echo "$valor, ";

    }
}

imprimeArray(["hola,  mundo", "adios, mundo", "hola, mundo"]);

?>
<br>
<?php

function separar($array, $sepador){
    $contador = 0;
    foreach ($array as $valor) {
        $contador ++;
        if ($contador == count($array)) {
            echo " $valor.";
        }else{ 
        echo $valor . $sepador;
        }

    }
}
$arrayName = array("hola, mundo", "adios, mundo", "hola, mundo");

separar($arrayName, "->");

//si no recibe un segundo parametro se reste automaticamente 1 

function restarCantidad($numero, $cantidad=1){
    $numero-=$cantidad;
    return $numero;
}

echo restarCantidad(3,9);
echo restarCantidad(3);

function saludar ($nombre="Desconocida", $tratamiento ="D./Dña)"){

    echo "<p>Hola  $tratamiento $nombre</p>";

}

saludar("Pepa", "Sra.");
saludar("Juan");
saludar();

//otras forma de hacer funciones con numero variable de parametros

function sumaTodosElementos(){
    if (func_num_args() == 0){
    return false;
        } else {
    $suma = 0;
    
    foreach (func_get_args() as $n) {
    $suma += $n;
    }
    return $suma;
    }
}
    echo "<p>" . sumaTodosElementos(1, 2, 3, 4) . "</p>"; // 10
    echo "<p>" . sumaTodosElementos() . "</p>"; // No se imprime nada
    (false);
    echo "<p>" . sumaTodosElementos(99) . "</p>"; //
//si no recibe parametros devuelve -1

function sumaNumerosV2() {
    if (func_num_args() == 0) {
        return -1;
    }
    $array = func_get_args();
    $suma = 0;
    foreach ($array as $numero) {
        $suma += $numero;
    }

    return $suma;
}

echo "<hr>";
echo sumaNumerosV2(); 
echo "<hr>";

function sumaNumerosV3() {
    if (func_num_args() == 0) {
        return -1;
    }
    $array = func_get_args();
    $suma = 0;
    foreach ($array as $numero) {
        $suma += $numero; 
    }
    return $suma;
}

echo "<hr>";
echo sumaNumerosV3(6, 7, 8); 
echo "<hr>";

$array=[1,2,3];
var_dump($array);


?>
    
</body>
</html>