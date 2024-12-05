<?php
session_start();
$id = $peso = $especie = "";
$enferma = false;
$idErr = $pesoErr = $especieErr = "";
$errores = false;


include $_SERVER['DOCUMENT_ROOT'] . "/bd/funcionesBD.php";

include $_SERVER['DOCUMENT_ROOT'] . "/clases/oveja.php";


function securizar ($cadena) {
    $cadena = trim($cadena);
    $cadena = stripslashes($cadena);
    $cadena = htmlspecialchars($cadena);
    return $cadena;
    }

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $id = securizar($_POST["id"]);
    $peso = securizar($_POST["peso"]);
    $especie = securizar($_POST["especie"]);

    if (empty($id)) {
        $idErr= "Rellena el campo";
        $errores = true;
    }
    if(empty ($peso)){
        $pesoErr="Rellena el campo";
        $errores=true;
    }
    if(empty($especie)){
        $especieErr="Rellena el campo";
        $errores = true;

    }

    if (isset($_POST["enferma"])) {
        $enferma = true;
    }

    if (!$errores) {
        $oveja = new Oveja($id, $peso, $especie, $enferma);
        guardarOveja($oveja);
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

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    
ID: *<input type="text" 
    name="id" 
    value="<?php echo $id; ?>">
    <span style="color: red;"><?php echo $idErr; ?></span>
    <br>
    Peso: *<input type="number"
    name="peso"
    min =0
    step =0.01 
    value="<?php echo $peso; ?>">
    <span style="color: red;"><?php echo $pesoErr; ?></span>
    <br>
    Especie: *<input type="text" 
    name="especie" 
    value="<?php echo $especie; ?>">
    <span style="color: red;"><?php echo $especieErr; ?></span>
    <br>
    Enferma: <input type="checkbox" 
    name="enferma" 
    <?php echo $enferma ? 'checked' : ''; ?>>
    <br>
    <input type="submit" value="Guardar">
</form>
    
</body>
</html>