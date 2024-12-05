<?php
/*
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    echo "hola desde PHP";

    /*Aqui vamos a hacer $_SERVER: Información del servidor y del entorno de 
    ejecución, por lo que si $_SERVER["REQUEST_METHOD"]=="POST"  significa que 
    si el metodo es  POST, entonces se ejecutará el código se ejecutura



}*/

$nombreErr = $passErr = $fechaErr = $generoErr = " ";  /*Inicializar variables
vacias para que los campos no se queden vacios (es una validacion con PHP
porque se podria hacer tambien con Required en HTML)*/

$nombre = $pass = $nacimiento = $genero = ""; 


//Variable boolean que verifica si no ha habido errores:
    $errores= false;
    //Variable que almacena el mensaje de error:
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    //Acedemos primero a nombre, para ello accedemos como si fuese una array:
    $nombre =$_POST["nombre"];
    if (empty($nombre)) {
        $nombreErr = "El nombre es obligatorio";
        $errores = true;
    }

    $pass = $_POST["pass"];
    if (empty($pass)) {
        $passErr = "La contraseña es obligatoria";
        $errores = true;
    }

    $nacimiento =  $_POST["nacimiento"];
    if (empty($nacimiento)) {
        $fechaErr = "La fecha de nacimiento es obligatoria";
        $errores = true;
    }

    $genero = $_POST["genero"];
        if (empty($genero)) {
            $generoErr = "Indica el genero";
            $errores = true;
        }else{
            $genero = $_POST["genero"];

        }

        if (!$errores) {
            echo "<h1>Estos son tus datos</h1>";
            echo  "Nombre: $nombre <br>";
            echo "Contraseña: $pass  <br>";
            echo  "Fecha de nacimiento: $nacimiento <br>";
            echo  "Genero: $genero <br>";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>

  
</head>
<body>
    <?php
    /*var_dump($_SERVER):
    /*Nos dara muchos datos pero nos interesa request method nos dira si
    hemos llegado a traves de una peticion GET o POST
    Y PHP_SELF nos indica la dirección del fichero actual*/
    ?>

<!--Si en action ponemos $_SERVER['PHP_SELF']
por ello meteremos dentro de action codigo php:-->

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> <!--Con method= "POST" 
        los datos no apareceran en el url
        y con action="ruta_direccion" nos mandara a la siguiente 
        pagina HTML-->
        <label>Nombre y apellidos: </label>
        <input type="text" name="nombre" value="<?php
        echo $nombre; ?> "><!--Pone un valor por defecto-->
        <br>
        <label>Contraseña: </label>
        <input type="password" name="pass">
        <?php
        echo $passErr;
        ?>
        <br>
        <label>Fecha nacimiento: </label>
        <input type="date" name="nacimiento">
        <?php
        echo $fechaErr;
        ?>
        <br>
        <label>Género: </label>
        <input type="radio" name="genero" value="Mujer" <?php if ($genero == "Mujer") echo "checked"; ?>>Mujer
        <input type="radio" name="genero" value="Hombre" <?php if ($genero == "Hombre") echo "checked"; ?>>Hombre
        <input type="radio" name="genero" value="Otro" <?php if ($genero == "Otro") echo "checked"; ?>>Otro
        <br>
        <br>

        <!--Con checked al final de la etiqueta se selecciona 
        por defecto un radio button-->
        
        <?php
        echo $generoErr;
        ?>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <!-- cuando le damos a enviar vemos que cambia la url con los datos:
     ej: http://localhost:3000/codigo/Tema3/Tema4/Formulario.php?nombre=Aitor&name=1234&nacimiento=2024-10-31&genero=Hombre
     pero tenemos que indicarle que le queremos pasar
     Get: acceder a la informacion
     Post: cuano queremos pasar informacion
     en la url aparecera clave (nombre y apellido) y el valor
     
     
     -->
</body>
</html>