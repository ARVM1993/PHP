<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <?php
    $num =9;
    switch($num){
        case $num > 3: echo "Es mayor que 3";
        break;
        case $num < 3: echo "Es menor a 3";
        break;
        default: echo "Es igual";


    }


    ?>

<?php

$num;
for ($i=0; $i < $num; $i++) { 
    echo "Se va a repetir 9 veces";
}

for ($i = 56, $cont = 1; $i > 42; $i-=3, $cont++) {
    echo "<br>$cont. $i";
    }

    for ($i=0; $i <=5 ; $i++) { 
        # code...
    }

    $num =1;

    while ($num <=5) {
        echo "Mientras sea menor o igual a 5";
        $num++;
    }


    ?>
    
</body>
</html>