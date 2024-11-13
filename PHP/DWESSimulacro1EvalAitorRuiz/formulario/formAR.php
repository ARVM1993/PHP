<?php
$nombre=$telefono=$opciones="";
$nombreErr=$telefonoErr=$opcionesErr="";
$errores= false;

$nombre = $_POST["nombre"];
if (empty($nombre)) {
    $nombreErr = "El nombre es obligatorio";
    $errores = false;
}
$telefono = $_POST["telefono"];
if (empty($telefono)) {
    $passErr = "El telefono es obligatoria";
    $errores = true;
}
$opciones = $_POST["opciones"];
if (empty($opciones)) {
    $opcionesErr = "Indica una opcion";
    $errores = true;
}else{
    $opciones = $_POST["opciones"];

}

if (!$errores) {
    echo "<h1>Estos son tus datos</h1>";
    echo  "Nombre: $nombre <br>";
    echo "Telefono: $telefono  <br>";
    echo  "Opcion: $opciones <br>";

}



?>


    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?= htmlspecialchars($isbnLibro) ?>"><br>

        <label>Telefono:</label><br>
        <input type="text" name="telefono" value="<?= htmlspecialchars($tituloLibro) ?>"><br>
        <label>Opciones: </label>
        <input type="radio" name="opciones" value="Personal" <?php if ($opciones == "Personal") echo "checked"; ?>>Mujer
        <input type="radio" name="opciones" value="Trabajo" <?php if ($opciones == "Trabajo") echo "checked"; ?>>Hombre
        <input type="radio" name="opciones" value="Otros" <?php if ($opciones == "Otros") echo "checked"; ?>>Otro
        <br>
        <br>
        <input type="submit" name="suscrito" value="Crear Formulario">
    </form>
