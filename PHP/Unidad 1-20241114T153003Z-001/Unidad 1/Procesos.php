<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Procesados</title>
</head>
<body>
    <h1>Datos Recibidos</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);

        echo "<p>Nombre: " . $name . "</p>";
        echo "<p>Correo Electrónico: " . $email . "</p>";
    } else {
        echo "<p>No se han recibido datos.</p>";
    }
    ?>
    <a href="indice.php">Volver</a>
</body>
</html>
