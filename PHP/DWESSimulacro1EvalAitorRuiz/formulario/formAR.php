<?php

session_start();//poemos hacer lo que quiera con $_SESION
$nombre = $telefono = $tipo = "";
$nombreErr = $telefonoErr = $tipoErr = "";
$errores = false;


function securizar($cadena){
    $cadena = trim($cadena);
    $cadena = htmlspecialchars($cadena);
    $cadena = stripslashes($cadena);
    return $cadena;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = securizar($_POST["nombre"]);
    if (empty($nombre)) {
        $nombreErr = "El campo es obligatorio";
        $errores = true;
    } elseif (strlen($_POST["nombre"]) <= 3) {
        $nombreErr = "La longitud debe ser mayor a 3";
        $errores = true;
    }

    $telefono = securizar($_POST["telefono"]);
    if (empty($telefono)) {
        $telefonoErr = "El campo es obligatorio";
        $errores = true;
    } elseif (strlen($_POST["telefono"]) <= 3) {
        $telefonoErr = "La longitud debe ser mayor a 3";
        $errores = true;
    }

    if (isset($_POST["tipo"])) {
        $tipo = securizar($_POST["tipo"]);
    }

    if (!$errores) {
        //Guardaremos variables en $_SESSION
        $_SESSION["nombre"] = $nombre;
        $_SESSION["telefono"] = $telefono;
        $_SESSION["tipo"] = $tipo;
        $_SESSION["registrado"]= true;
        header("Location: ./indexAR.php");
        exit();
    }

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario XY</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" class="<?php if (!empty($nombreErr)) echo "err"; ?>" value="<?php echo $nombre; ?>"> <!--value almacena el valor que le introducimos y lo veremos en el inspeccionar codigo de la pagina-->
        <span class="error"><?= $nombreErr; ?></span><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" class="<?php if (!empty($telefonoErr)) echo "err";?>" value="<?php echo $telefono; ?>">
        <span class="error"><?php echo $telefonoErr; ?></span><br>

        <label>Tipo:</label>
        <input type="radio" name="tipo" value="Personal" <?php if ($tipo == "Personal") echo "checked"; ?>>
        <label for="personal">Personal</label>
        <input type="radio"  name="tipo" value="Trabajo" <?php if ($tipo == "Trabajo") echo "checked"; ?>>
        <label for="trabajo">Trabajo</label>
        <input type="radio" name="tipo" value="Otros" <?php if ($tipo == "Otros") echo "checked"; ?>>
        <label for="otros">Otros</label>
        <span class="error"><?php echo $tipoErr; ?></span><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>