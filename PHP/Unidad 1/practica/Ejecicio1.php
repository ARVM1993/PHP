<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>EJERCICIO 1: BUCLES ANIDADOS</h1>
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
</body>
</html>