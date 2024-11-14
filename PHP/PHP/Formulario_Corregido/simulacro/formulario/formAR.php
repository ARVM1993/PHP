<?php

session_start();    //COn esta línea puedo hacer lo que quiera con $_SESSION

$nombre = $tel = $tipo = "";
$nombreErr = $telErr = "";
$errores = false;
//var_dump($_POST);
//Luego muevo esta función:
function securizar($cadena){
    $cadena = trim($cadena);
    $cadena = htmlspecialchars($cadena);
    $cadena = stripslashes($cadena);
    return $cadena;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Si he llegado después de enviar el formulario
    $nombre = securizar($_POST["nombre"]);
    if (empty($nombre)){
        $nombreErr = "Campo obligatorio";
        $errores = true;
    } elseif (strlen($nombre) < 3){
        $nombreErr = "Tiene que tener longitud mayor a 3";
        $errores = true;
    }

    $tel = securizar($_POST["tel"]);
    if (empty($tel)){
        $telErr = "Campo obligatorio";
        $errores = true;
    } elseif (strlen($tel) < 3){
        $telErr = "Tiene que tener longitud mayor a 3";
        $errores = true;
    }

    if (isset($_POST["tipo"])){
        $tipo = securizar($_POST["tipo"]); //NO hace falta securizarlo
    }

    //Aquí si no ha habido errores, me voy a index.
    // Tengo que guardar en una sesión las variables del formulario
    if (!$errores){
        //Guardamos variables en $_SESSION:
        $_SESSION["n"] = $nombre;
        $_SESSION["t"] = $tel;
        $_SESSION["tipo"] = $tipo;
        $_SESSION["registrado"] = true; //NO hacía falta para el simulacro
        header("Location: ../indexXY.php");
        exit();
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        input.err{
            border-color: red;
        }
    </style>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        Nombre: *
        <input type="text" name="nombre" 
            class="<?php if (!empty($nombreErr)) echo "err"; ?>"
            value="<?php echo $nombre; ?>" >
        <label class="err"><?php echo $nombreErr; ?></label>
        <br>
        Teléfono: * <input type="text" name="tel">
        <label class="err"><?php echo $telErr; ?></label>
        <br>
        Tipo:<br>
        <input type="radio" name="tipo" value="personal"><?php if($tipo=="personal") echo "checked";?>Personal
        <br>
        <input type="radio" name="tipo" value="trabajo">Trabajo
        <br>
        <input type="radio" name="tipo" value="otros">Otros
        <br>
        <input type="Submit">
    </form>
</body>
</html>