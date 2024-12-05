<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    //Declaracion de arrays:
    //Forma1:

    $numeros = array(4, -3, 9, 56);
    echo "$numeros[2]<br>";

    //Añadir un valor a un array ya creado:
    $numeros[]=33;
    $numeros[5]=44; //va a la posicion 5
    //pero si lo colocamos en una posicion ya ocupada lo sustituirá
    $numeros[5]=40;
    // si lo situamos en posicion no consecutiva: 
    $numeros[9]=100; 
    sort($numeros);
    print_r($numeros);

    echo "<br>" . "<br>";

    //Forma2:
    $nombres =["Luz", "Juan", "Alberto"];
    echo "$nombres[4]", "<br>";

    //Forma3:
    $aprobados[0]= True;
    $aprobados[1]= False;
    $aprobados[2]= False;
    $aprobados[5]= True;

   if ($aprobados[0]) {
    echo "Aprobado";

   }else {
    echo "No Aprobado";
   }

   echo "<br>" . "<br>";

//Recorrer: 
for ($i=0; $i <count($numeros) ; $i++) { 

    echo "$numeros[$i], ";

}
for ($i=0; $i <count($numeros) ; $i++) { 
    echo "La longitud es de: . $numeros[$i]<br>";
}
echo "<br>" . "<br>";

//FOREACH: JAVA: for(tipo variable : coleccion)
//PHP: foreach(coleccion as variable(que le quieras poner))

foreach ($nombres as $aaa) {
    echo "$aaa, ";
}

echo "<br>" . "<br>";

//ARRAYS ASOCIATIVOS: LAS CLAVES TIENEN QUE SER UNICAS

$capitales =array(
    "Francia"=> "París",
    "Italia"=>"Roma", 
    "Yemen"=>"Sanah");
 
    # Meter uno nuevo:
    $capitales["Mongolia"]="Ulan Bator";
    //NO PUEDE HABER CLAVES DUPLICADAS, CAMBIA EL VALOR
    $capitales["Francia"] ="Marsella";
    
    foreach ($capitales as $ciudad) {
       echo " $ciudad, ";
    }

    $capitales = array(
        "Francia" => "Marsella",
        "Italia" => "Roma", 
        "Yemen" => "Sanah",
        "Mongolia" => "Ulan Bator"
    );

    echo "<br>" . "<br>";
   
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
    echo "<br>" . "<br>";
    sort($numeros); //De menor a mayor (preferiblemente solo con los indexados, con asociativos se pierden las claves)
    var_dump($numeros); //Info sobre una
    rsort($numeros);//De mayor a menor

    echo "<br>" . "<br>";

    sort($capitales);
    var_dump($capitales);
    
    foreach ($capitales as $ciudad) {
        echo $ciudad . "\n";
    }

    echo "<br>" . "<br>";
    //Arrays asociativos: ksort
    ksort($capitales); //Ordena un array por clave
    print_r($capitales);

    echo "<br>" . "<br>";

    asort($capitales); //ordena alfabeticamente por valor
    print_r($capitales);

    echo "<br>" . "<br>";

    krsort ($capitales); //Ordena alfabeticamente al reves por clave
    print_r($capitales);

    echo "<br>" . "<br>";

    arsort($capitales); //Ordena alfabeticamente al reves por valor
    print_r($capitales);

    echo "<br>" . "<br>";

//Funcion que dice si esta o no definicda una variable
    if (isset($capitales["Francia"])) {
        echo "Francia si<br>";
    }else{
        echo "Francia no <br>";
    }

//Representara el valor (nombres)
$arrayName = array("67564345B" => "Juan", "56238425V" =>"Luisa", "7387464F"=> "Juan");
echo "<br>" . "<br>";
foreach ($arrayName as $n) {
echo $n . "<br>";
if ($arrayName == array_pop ($arrayName)) {
    echo "es juan";
} else{
    echo "no lo es";
}
}


//Representara la clave con su correspondiente valor
foreach ($arrayName as $clave => $valor) {
    echo "$clave --- $valor <br>";

}
$variable = array_pop($arrayName);
    echo $variable;



    ?>
    
</body>
</html>