<?php

$nombre = array("Aitor", "Zaida", "Nuria");
print_r(value: $nombre);
echo"<br>";
$nombre = ["Aitor", "Zaida", "Nuria"];
print_r(value: $nombre);
echo "<br>";

$nombre[0]= "Aitor";
$nombre[1]="Zaida";
$nombre[2]="Nuria";
$nombre[]="Alv";
print_r(value: $nombre);

echo "<br>";

sort($nombre);
for ($i=0; $i<count($nombre); $i++){
    if ($i == count($nombre) -1) {
        echo " y " . $nombre[$i];
    } elseif ($i==count($nombre)-2) {
        echo ($nombre[$i]) . " ";
    }else{
        echo $nombre[$i] . ", ";
    }
}
echo "<br>";

foreach ($nombre as $i => $amiguitos) {
    if ($i==count($nombre)-1) {
        echo " y " . $amiguitos;
    }elseif ($i==count($nombre)-2) {
        echo $amiguitos . " ";
    }else{
        echo $amiguitos . ", ";
    }
}

echo "<br>";

$capitales = array(
    "Peru" => "Lima",
    "Argentina" => "Buenos Aires",
    "España" => "Madrid"
);

$primeraIteracion = true;
$totalNombres = count($capitales); // Total de elementos en el array

foreach ($capitales as $pais => $capital) {
    if ($primeraIteracion) {
        // En la primera iteración, la "L" será mayúscula
        echo "<span style=\"text-transform: uppercase;\">L</span>a capital de {$pais} es {$capital}";
        // Cambiar a false para las siguientes iteraciones
        $primeraIteracion = false;
    } else {
        // En las iteraciones siguientes, la "L" será minúscula
        echo "<span style=\"text-transform: lowercase;\">L</span>a capital de {$pais} es {$capital}";
    }

    // Si es la última iteración, ponemos un punto en lugar de una coma
    if ($pais === array_key_last($capitales)) {
        echo ".\n";
    } else {
        echo ", \n";
    }
}
echo "<br>";


$num=6;
function sumar($num){

    return 5+$num;
    
}

echo sumar($num);


$numero = 5;

function incrementarValor($numero) {
    $numero = $numero + 1;  // Solo cambia el valor dentro de la función
    echo "Dentro de la función: $numero\n";
}
incrementarValor($numero);
echo "Fuera de la función: $numero\n"; 

echo "<br>";


$n=4;
function sum($n){
    $num= $n + 5;
    echo $num;

}

$mostrar=sum(3);
echo($mostrar);



$aleatorios=[];


for ($i=0; $i <20 ; $i++) { 
    $aleatorios[] = rand(10,50);
    $result= array_sum($aleatorios);
    $media=$result/count($aleatorios);

}

echo "<p>Los numero de la array son: " . implode("," ,$aleatorios) . "</p>";
echo "<p>La suma de los numeros es: $result</p>";
echo "<p>La media es: $media</p>";

$suma=0;
foreach ($aleatorios as $numeros) {
    $suma+=$numeros;
    $media2=$suma/count($aleatorios);

}


echo "la media es " . $media2;

$maximo = $aleatorios[0];
$minimo = $aleatorios[1];

foreach ($aleatorios as $numeros) {
    if ($numeros > $maximo) {
        $maximo=$numeros;
    } 
    elseif ($numeros < $minimo) {
        $minimo= $numeros;
    }
}

echo "El mayor maximo es . $maximo";
echo "El mayor minimo es . $minimo";

echo "<br>";

echo "<br>";

echo "<link rel='stylesheet' type='text/css' href='css.css'>";

$amiguitos=[
    "Aitor"=> 1.7,
    "Nuria"=> 1.6,
    "Javi"=> 1.74,
    "Alv"=> 1.7,
    "Zaida"=> 1.68,
    "Cris"=> 1.67,
];

$suma=0;
foreach ($amiguitos as $alturas) {
$suma+=$alturas;
}

echo $mediaAmiguitos= $suma/count($amiguitos);

echo "<table>
        <tr>
            <th>Nombres</th>
            <th>Alturas</th>
        <tr>";

foreach ($amiguitos as $nombres => $alturas) {
    echo "<tr>
            <td>$nombres</td>
            <td>$alturas</td>
        </tr>";
}
echo "<tr>
        <th>Media</th>
        <td><strong> " . number_format($mediaAmiguitos, 2) . "</strong></td>
    </tr>
    </table>";



echo "<br>";
echo "<br>";

$numeros=[];
$cuadrados=[];
$cubos=[];

for ($i=0; $i < 10; $i++) { 
    $numeros[]= rand(1,100);
}

foreach ($numeros as $valores) {
    $cuadrados[]=$valores**2;
    $cubos[]=$valores**3;
}
echo implode(", ", $numeros);
echo "<br>";

echo implode(", ", $cuadrados);
echo "<br>";

echo implode(", ", $cubos);

echo "<table border=1>
<tr>
<th>Numeros</th>
<th>Cuadrados</th>
<th>Cubos</th>
</tr>";

for ($i=0; $i < count($numeros); $i++) { 
    echo "<tr>
    <td>$numeros[$i]</td>
    <td>$cuadrados[$i]</td>   
    <td>$cubos[$i]</td>
    </tr>";
}
echo "</table>";

/*
foreach ($numeros as $key => $value) {
    echo "<tr>
            <td>{$value}</td>                  
            <td>{$cuadrados[$key]}</td>           
            <td>{$cubos[$key]}</td>              
          </tr>";
}
*/


$alumnado =["Aitor","Nuria", "Zaida", "Cris"];
$notas=[6,8,4,9];
$matriculas=[true, true, false, true];

echo "<ul>";

for ($i=0; $i <count($alumnado); $i++) { 

    if ($matriculas[$i]) {
        $matriculado = "sí";
    } else {
        $matriculado ="no";
    }


    if (str_starts_with($alumnado[$i], "A")){
        $empiezaConA = "empieza por A";

        }else{
            $empiezaConA = "NO empieza por A";
        }
        echo "<li> El alumno {$alumnado[$i]} tiene un {$notas[$i]} y {$matriculado} está matriculado y {$empiezaConA}</li>";

    }



echo "</ul>";

?>