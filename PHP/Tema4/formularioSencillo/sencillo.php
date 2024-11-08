<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method ="POST">
        <label>Nombre:</label> <!--guardaremos la infor en arrays asociativas-->
        <input type="text" name="name"><br> <!--accederemos con name, id sería para css -->
        <input type="submit" name ="enviar">
        <input type="reset" name="restablecer">
    </form>       
    <?php
    var_dump($_POST); /*Se muestra la array con array asociativa clave-valor*/
    var_dump($_SERVER); /*Informacion del entorno de ejecucion, entre ellas: REQUEST METHOD, cuando visitamos de nuevas es GET pero cuando enviamos la info cambia a POST*/
    if ($_SERVER["REQUEST_METHOD"]== "POST") {
        echo "<p>He llegado a través del formulario</p>";
    }else{
        echo "<p>Primera visita</p>";
    }
    echo "<p> El nombre introducido es: {$_POST["name"]}</p>"; /*Accedemos a la variable nombre
    con el nombre del campo del formulario en este caso  name como  clave del array asociativo*/
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar Nombres en Array</title>
</head>
<body>
    <?php
        // Iniciar la sesión para almacenar los nombres introducidos
        session_start();
        
        // Inicializar el array de nombres si no existe
        if (!isset($_SESSION['nombres'])) {
            $_SESSION['nombres'] = []; // Creamos el array vacío en la sesión
        }

        // Si se ha enviado el formulario y el campo de nombre no está vacío
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['name'])) {
            $nombre = htmlspecialchars($_POST['name']); // Sanitizamos el nombre ingresado
            $_SESSION['nombres'][] = $nombre; // Agregamos el nombre al array en sesión
        }
    ?>

    <!-- Formulario para introducir el nombre -->
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">>
        <label>Nombre:</label>
        <input type="text" name="name"><br>
        <input type="submit" name="enviar">
        <input type="reset" name="restablecer">
    </form>

    <!-- Mostrar el último nombre introducido -->
    <?php
        if (!empty($_POST['name'])) {
            echo "<p>El nombre introducido es: {$_POST['name']}</p>";
        }

        // Mostrar todos los nombres introducidos
        echo "<h3>Todos los nombres introducidos:</h3>";
        if (!empty($_SESSION['nombres'])) {
            echo "<ul>";
            foreach ($_SESSION['nombres'] as $nombreGuardado) {
                echo "<li>$nombreGuardado</li>";
            }
            echo "</ul>";
        }
    ?>

</body>
</html>
