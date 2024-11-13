<?php

echo "<h1>Ejercicio 1</h1>
<h4>1.1</<h4>";

echo" <br>";

$amiguitos= [

    1=>"Lucia",
    2=>"Aitor",
    3=>"Valentina",
    4=>"Victor",
    5=>"Dani",
    6=>"Toñin",
];


echo" <br>
Las claves y valores que cumplen la condición son las siguientes:
<br>";
foreach ($amiguitos as $clave => $nombre) {
    if ($clave % 2 == 0) {
        echo "$clave - $nombre <br>";
    }

}

echo "<br>
<h4>1.2</<h4>
<br><br>";

include_once "./funciones/funcAR.php";

echo dividir(5,3);
echo "<br>";
echo dividir(4);
echo "<br>";
echo dividir(3,0);
echo "<br>";

echo "<h4>1.3</<h4>
<br>";


echo concatenar(["a","b","c"], ["d","e","f"] );
echo "<br>";
echo concatenar();
echo "<br>";
echo concatenar("hola",2);
echo "<br>";

echo "<h4>1.4</<h4>
<br>";

$profes = [
            "DAW" => [ 
                    "Sete" => ["DWES"],
                    "Manuel" => ["DWEC", "SSII"],
                    "Santi" => ["FOL", "EIE"]
                    ]
        ];
    
foreach ($profes as $modulo => $profesores) {
     foreach ($profesores as $profes => $asignaturas) {
            echo "<p>$profes imparte " . implode(",", $asignaturas). "</p>";
            }
        }

echo "<br>
<h2>Ejercicio2</<h2>
<br>";

include_once "./clases/Plato.php";
include_once "./clases/Postre.php";
include_once "./clases/Principal.php";

echo $principal1 = new Principal("hamburguesa", 12.5, true);
echo "<br>";
echo $principal2 = new Principal("chuleton", 21.3, false);
echo "<br>";
echo $postre1 = new Postre("pastel", 15.5, 100.4);
echo "<br>";
echo $postre2 = new Postre("torta", 10.5, 50);

echo "<br>";


echo "<table border=1>
<tr>
<th>Nombre</th>
<th>Precio</th>
<th>Tiene Gluten</th>
</tr>

<tr>
<td>{$principal1->getNombre()}</td>
<td>{$principal1->getPrecio()}</td>
<td>{$principal1->getTieneGluten()}</td>
</tr>

<tr>
<td>{$principal2->getNombre()}</td>
<td>{$principal2->getPrecio()}</td>
<td>{$principal2->getTieneGluten()}</td>
</tr>


</table>";

echo "<br>";


echo "<table border=1>
<tr>
<th>Nombre</th>
<th>Precio</th>
<th>Cantidad Azucar</th>
</tr>

<tr>
<td>{$postre1->getNombre()}</td>
<td>{$postre1->getPrecio()}</td>
<td>{$postre1->getCantidadAzucar()}</td>
</tr>

<tr>
<td>{$postre2->getNombre()}</td>
<td>{$postre2->getPrecio()}</td>
<td>{$postre2->getCantidadAzucar()}</td>
</tr>


</table>";

$principal=[$principal1, $principal2];
$postre=[$postre1, $postre2];

echo "<table border=1>
<tr>
<th>Nombre</th>
<th>Precio</th>
<th>Tiene Gluten</th>
</tr>";

foreach ($principal as $platoPrincipal) {
    echo "<tr>
    <td>{$platoPrincipal->getNombre()}</td>
    <td>{$platoPrincipal->getPrecio()}</td>
    <td>{$platoPrincipal->getTieneGluten()}</td>


    </tr>";
}

echo "<table border=1>
<tr>
<th>Nombre</th>
<th>Precio</th>
<th>Azucar</th>
</tr>";

foreach ($postre as $platoPostre) {
    echo "<tr>
    <td>{$platoPostre->getNombre()}</td>
    <td>{$platoPostre->getPrecio()}</td>
    <td>{$platoPostre->getCantidadAzucar()}</td>


    </tr>";
}

echo "</table>";

$plato =[$principal1, $principal2, $postre1, $postre2];

echo "<table border=1>
<tr>
<th>Nombre</th>
<th>Precio</th>
<th>Detalles</th>
</tr>";
foreach ($plato as $platos) {
    echo  "<tr>
    <td>{$platos->getNombre()}</td>
    <td>{$platos->getPrecio()}</td>
    <td>";
    if($platos instanceof Principal){
        echo $platos->getTieneGluten();
    }
    if ($platos instanceof Postre) {
        echo $platos->getCantidadAzucar() . "gramos";
        
    }

    echo" </td>
    </tr>";
}
echo "</table>";