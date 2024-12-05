
<?php
//Switch

$option=5;
switch ($option) {
    case '1':
        echo "Lunes";
        break;
    case '2':
        echo 'Martes';
        break;
    case '3':
        echo 'Miercoles';
        break;
    case '4':
        echo 'Jueves';
        break;
    case '5':
        echo 'Viernes';
        break;
    case '6':
        echo 'Sabado';  
    default:
        echo "domingo";
        break;
}

//Operador ternario: abrevia un bloque de sentencias
//que solo tenga un if y else-if

$nota=6;
$condicion = ($nota > 5) ? "aprobado" :"suspenso";
echo $condicion;

for ($i = 56, $cont = 1; $i > 42; $i-=3, $cont++) {
    echo "<br>$cont. $i";
    }

/*para imprimir una array hay que usar print_r en
vez echo, porque echo imprime cadenas de texto no
preparada para estructuras de datos compleja.
*/

/*
Array indexado: colecciones de datos ordenadas
en las que cada elemento es identificado por
un indice que empieza en 0. Podemos declararlo:
*/
$ejemplo = array("1","2","3");
print_r( $ejemplo);
$ejemplo2=["1","2","3"];
$ejemplo3;
$ejemplo3[0]= "manzana";
$ejemplo3[1]="naranja";
$ejemplo3[]="pera";
$ejemplo3[3]= "pomelo";
$ejemplo3[5]= "fresa";
print_r ($ejemplo3);

$prueba []= "naranja";

$prueba[7]="verde";
print_r($prueba);

/*pero si podemos ejecutar 
echo para mostrar una determinada 
posicion del array
*/
echo $ejemplo3[1];


$nombres=["Aitor","Alvaro","Nuria", 
"Cris", "Javi", "Zaida"];


/*
utilizaremos un for para recorrer la array.
con la funcion count podemos conocer el numero
de elementos de una array
*/

echo count($nombres);

/*podemos utilizar count
para otros propositos*/
$contador =0;
for ($i=0; $i < count($nombres); $i++) { 
    $contador ++;

    if ($contador == count($nombres)) {
        echo $nombres[$i] . ".";
    } else{
        echo $nombres[$i] . ",". " ";
    }
}

//podemos almacenar una variable con el foreach
foreach ($nombres as $nombre) {
    echo $nombre;
}


/*
arrays asociativos: como un hashmap en Java, es decir,
existen una serie de clave-valor en la que cada clave 
apunta a un determinado valor. Podemos declarar
arrays asociativos de 3 formas:
*/

$capitalesEuropa = array(
    "España" => "Madrid", 
    "Francia" => "Paris", 
    "Alemania" => "Berlín"
);


print_r($capitalesEuropa);
$capitalesAmerica = [
    "Argentina"=>"Buenos Aires", 
    "Colombia"=>"Bogotá",
    "Chile"=>"Santiago de Chile"
];
print_r($capitalesAmerica);

$capitalesAsia["Tokio"]= "Japon";
$capitalesAsia["China"]="Beijing";
$capitalesAsia["India"]="Nueva Delhi";

echo ksort($capitalesAsia);

echo $capitalesAsia["Tokio"];

echo $capitalesEuropa["España"];

/*
En el caso de los arrays asociativos
es necesario usar los foreach para recorrerlos
*/
foreach ($capitalesAmerica as $paises => $capital) {
    echo $paises;

    echo $capital;
}

/*Funciones utiles con arrays:
-sort(): ordena de manera ascendente los arrays indexados, en los asociativos sustituira las
claves por indices
-rsort()(reverse sort): ordena de manera descendente 
-asort()(asociative sort): ordena de forma ascendente asociativos
-arsort()(asociative reverse sort); ordena de forma descendente asociativos
-ksort()(key sort): ordena ascendente asociativo por clave
-krsort()(key reverse sort): ordena descendente asociativo por clave
-print_r($array): imprime contendido array
-array_keys($array): devuelves las claves
-array_pop($array): elimina el ultimo elmento de la array
-array_push($array, $valor): añade un nuevo elemento al final array
-in_array($elemento_a_comparar, $array): verifica que el elemento sea un
sea un valor de la array y devuelve un boolean

isset($variable): devuelve un boolean si la variable está declarada,
puede tb isset($array[$elemento_a_comparar]):verifica que el 
elemento sea una clave de la array asociativo, y en uno indexado
comprobará que existe esa posicion. 
*/

?>