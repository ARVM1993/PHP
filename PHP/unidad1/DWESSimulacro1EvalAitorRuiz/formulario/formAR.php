<?php
session_start();

$nombre = $telefono = $opciones = "";
$nombreErr = $telefonoErr = "";
$errores = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["enviar"])) {
        // Sanitización de los datos recibidos
        $nombre = htmlspecialchars(trim($_POST["nombre"]));
        $telefono = htmlspecialchars(trim($_POST["telefono"]));
        $opciones = isset($_POST["opciones"]) ? htmlspecialchars($_POST["opciones"]) : "";

        // Validación del nombre
        if (empty($nombre)) {
            $nombreErr = "El campo nombre es obligatorio";
            $errores = true;
        } elseif (strlen($nombre) < 4) {
            $nombreErr = "El campo nombre debe tener más de 4 letras";
            $errores = true;
        }

        // Validación del teléfono
        if (empty($telefono)) {
            $telefonoErr = "El campo teléfono es obligatorio";
            $errores = true;
        } elseif (strlen($telefono) != 9) { // Aseguramos que tenga exactamente 9 caracteres
            $telefonoErr = "El campo teléfono debe tener exactamente 9 dígitos";
            $errores = true;
        } elseif (!preg_match("/^[0-9]{9}$/", $telefono)) { // Aseguramos que solo sean números
            $telefonoErr = "El campo teléfono debe contener solo números";
            $errores = true;
        }

        // Si no hay errores, redirigimos a indexXY.html con los datos
        if (!$errores) {
            // Formateamos los parámetros de la URL y redirigimos a indexXY.html
            header("Location: ../indexAR.php?nombre=" . urlencode($nombre) . "&telefono=" . urlencode($telefono) . "&tipo=" . urlencode($tipo));
            exit; // Aseguramos que el código posterior no se ejecute
        }
    }
}

var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
<form method="POST" action="<?= $_SERVER["PHP_SELF"];?>">
    <label>Nombre</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
    <span style="color: red;"><?= $nombreErr ?></span>
    <br>

    <label>Teléfono</label>
    <input type="text" name="telefono" value="<?= htmlspecialchars($telefono) ?>">
    <span style="color: red;"><?= $telefonoErr ?></span>
    <br>

    <label>Opciones: </label>
    <input type="radio" name="opciones" value="Personal" <?= ($opciones == "Personal") ? "checked" : ""; ?>> Personal
    <input type="radio" name="opciones" value="Trabajo" <?= ($opciones == "Trabajo") ? "checked" : ""; ?>> Trabajo
    <input type="radio" name="opciones" value="Otros" <?= ($opciones == "Otros") ? "checked" : ""; ?>> Otros
    <br>

    <input type="submit" name="enviar" value="Enviar">
    <input type="reset" value="Restablecer">
</form>
</body>
</html>


/DWESSimulacro1EvalAitorRuiz
    /formulario
        formAR.php
    indexAR.html  <-- Este es el archivo que debe existir en la raíz
    simulacroAR.php