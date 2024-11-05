<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <style>
        input.err {
            color: red;
            border: 1px solid red;
        }
        label.error {
            color: red;
        }
    </style>
</head>
<body>

<?php
$nombre = $edad = $estado = $suscrito = "";
$nombreErr = $edadErr = "";
$errores = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Para radiobuttons tengo que ver si existe en $_POST[]
    if (isset($_POST["estado"])) {
        $estado = $_POST["estado"];
    }

    if (empty($_POST["name"])) {
        $nombreErr = "El nombre es obligatorio";
        $errores = true;
    } else {
        $nombre = $_POST["name"];
    }

    if (empty($_POST["age"])) {
        $edadErr = "La edad es obligatoria";
        $errores = true;
    } else {
        $edad = $_POST["age"];
    }

    if (isset($_POST["suscrito"])) {
        $suscrito = "Sí, estás suscrito a la newsletter";
        $suscrito = true;
    } else {
        $suscrito = "No estás suscrito a la newsletter";
        $suscrito =false;
    }

    if (!$errores) {
        echo "<p>Registro exitoso: Nombre: $nombre, Edad: $edad</p>";
        if (!empty($estado)) {
            echo "<p>Tu estado civil es $estado</p>";
        } else {
            echo "<p>No has marcado tu estado</p>";
        }
        echo "<p>$suscrito</p>";
    }
}

var_dump($_POST);
?>

    <form method="POST">
        <label>Nombre:</label>
        <input 
            type="text"
            name="name" 
            value="<?php echo $nombre; ?>"
            class="<?php echo !empty($nombreErr) ? 'err' : ''; ?>"
        >
        <?php
        if (!empty($nombreErr)) {
            echo "<label class='error'>$nombreErr</label>";
        }
        ?>
        <br><br>

        <label>Edad*: </label>
        <input 
            type="number" 
            name="age" 
            value="<?php echo $edad; ?>"
            class="<?php echo !empty($edadErr) ? 'err' : ''; ?>"
        >
        <?php
        if (!empty($edadErr)) {
            echo "<label class='error'>$edadErr</label>";
        }
        ?>
        <br><br>
        
        <label>Estado civil: </label><br>
        <input 
        type="radio" 
        name="estado" 
        value="soltero" 
        <?php if ($estado == "soltero") echo "checked"; ?>>Soltero<br>
        
        <input 
        type="radio" 
        name="estado" 
        value="casado" <?php if ($estado == "casado") echo "checked"; ?>>Casado<br> 
        
        <input 
        type="radio" 
        name="estado" 
        value="viudo" <?php if ($estado == "viudo") echo "checked"; ?>>Viudo<br>

        <br>
        <label>
            <input type="checkbox" name="suscrito" <?php if(!empty($suscrito)) echo "checked";?>>
            
            Quiero suscribirme a la newsletter
        </label>
        <br><br>

        <input type="submit" name="enviar" value="Enviar">
        <input type="reset" name="restablecer" value="Restablecer">
    </form>

</body>
</html>
