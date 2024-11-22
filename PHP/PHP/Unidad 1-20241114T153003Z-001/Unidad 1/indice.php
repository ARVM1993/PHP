<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Sencillo</title>
</head>
<body>
    <h1>Bienvenido a la Aplicación PHP</h1>
    <form action="process.php" method="post">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
