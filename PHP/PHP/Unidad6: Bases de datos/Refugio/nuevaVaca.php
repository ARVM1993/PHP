<?php
session_start();

$id = $peso ="";
$idErr=$pesoErr="";
$errores = false;

function securizar($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $id = securizar($_POST["id"]);
    $peso = securizar($_POST["peso"]);
    if (empty($id)) {
        $idErr = "Por favor, ingrese el id";
        $errores = true;
        }
    if (empty($peso)) {
        $pesoErr = "Por favor, ingrese el peso";
        $errores = true;
    }
    if (!$errores) {
        $vaca = new Vaca($id, $peso);
        guardarVaca($vaca);
        header("Location: ./index.php");
        exit();
        
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
       ID: * <input type="text" 
        name="id"
        value="<?php echo $id;?>">
        <span style ="color: red" ><?php echo $idErr;?></span>
        <br>
      
        Peso: *<input type="number" 
         min = 0
        step = 0.01
        name="peso"
        value="<?php echo $peso;?>">
        <span style ="color: red" ><?php echo $pesoErr;?></span>

       
     
        <br>
        <input type="submit" name="guardar">
    </form>
    
</body>
</html>