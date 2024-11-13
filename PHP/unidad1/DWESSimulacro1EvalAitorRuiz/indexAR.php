<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Recibidos</title>
</head>
<body>

<h2>Datos del Formulario</h2>

<?php
if (isset($_GET['nombre']) && isset($_GET['telefono']) && isset($_GET['tipo'])) {
    $nombre = htmlspecialchars($_GET['nombre']);
    $telefono = htmlspecialchars($_GET['telefono']);
    $opciones = htmlspecialchars($_GET['Otros']);
    echo "<p>Nombre: $nombre. Número de teléfono: $telefono ($opciones).</p>";
} else {
    echo "<p>No se han recibido datos.</p>";
}
?>

</body>
</html>