<?php
session_start();

$nombre = $telefono = $opciones = "";
$nombreErr = $telefonoErr = $opcionesErr = "";
$errores = false;

function securizar($cadenas) {
    $cadenas = trim($cadenas);
    $cadenas = stripslashes($cadenas);
    $cadenas = htmlspecialchars($cadenas);
    return $cadenas;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validación para el nombre
    $nombre = securizar($_POST["nombre"]);
    if (empty($nombre)) {
        $nombreErr = "Por favor ingrese su nombre";
        $errores = true;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $nombre)) {
        $nombreErr = "Solo se permiten letras y espacios";
        $errores = true;
    } elseif (strlen($nombre) < 3) {
        $nombreErr = "Debe tener más de 3 caracteres";
        $errores = true;
    }

    // Validación para el teléfono
    $telefono = securizar($_POST["telefono"]);
    if (empty($telefono)) {
        $telefonoErr = "Debe ingresar un número de teléfono";
        $errores = true;
    } elseif (strlen($telefono) < 3) {
        $telefonoErr = "El teléfono debe tener más de 3 caracteres";
        $errores = true;
    }

    // Validación para las opciones
    if (empty($_POST["opciones"])) {
        $opcionesErr = "Por favor seleccione una opción";
        $errores = true;
    } else {
        $opciones = securizar($_POST["opciones"]);
    }

    // Si no hay errores, guardamos los datos en la sesión y redirigimos
    if (!$errores) {
        $_SESSION["nombre"] = $nombre;
        $_SESSION["telefono"] = $telefono;
        $_SESSION["opciones"] = $opciones;
        $_SESSION["registrado"] = true;
        header("Location: ../index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        .Err {
            border: 2px solid red;
        }
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>

<form action="<?= $_SERVER["PHP_SELF"]; ?>" method="POST">
    <label>Nombre: *</label>
    <input type="text" name="nombre" value="<?= $nombre ?>" class="<?= !empty($nombreErr) ? 'Err' : '' ?>">
    <span class="error"><?= $nombreErr ?></span>
    <br>

    <label>Teléfono: *</label>
    <input type="text" name="telefono" value="<?= $telefono ?>" class="<?= !empty($telefonoErr) ? 'Err' : '' ?>">
    <span class="error"><?= $telefonoErr ?></span>
    <br>

    <label>Opciones: *</label>
    <input type="radio" name="opciones" value="Trabajo" <?= ($opciones == "Trabajo") ? "checked" :"" ?>> Trabajo
    <input type="radio" name="opciones" value="Personal" <?= ($opciones == "Personal") ? "checked" : "" ?>> Personal
    <input type="radio" name="opciones" value="Otros" <?= ($opciones == "Otros") ? "checked" : "" ?>> Otros
    <span class="error"><?= $opcionesErr ?></span>
    <br>

    <input type="submit" value="Enviar">
</form>

</body>
</html>
