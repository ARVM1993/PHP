<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    function suma($a, $b){
        return $a + $b;
        }
/*pasamos el nombre de la funcion entre comillas como valor
de una variable. Con esa variable invocamos la funcion con ()
*/ 
    $nombreFuncion="suma";
    echo  $nombreFuncion(4,6);
?>
    
</body>
</html>