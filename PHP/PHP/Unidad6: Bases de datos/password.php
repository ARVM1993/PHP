<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
//variables que alberguen datos para la conexion con la BD
$user = "root";
$server= "127.0.0.1";
$pass = "Sandia4you";
$db = "daw";

//conectar con la BD
$conexion = new mysqli($server, $user, $pass, $db);

//Comprobamos que la conexion ha sido exitosa, sino terminamos
if ($conexion->connect_error) {
    echo "Ha habido errores en la conexion";
    exit();
}else{
    echo "Conectado con exito";
}

echo "<br>";

$alter = "ALTER table alumnos MODIFY column pass VARCHAR(255)";

//Comprobamos que se ha cumplido el alter table
if ($conexion->query($alter)) {
    echo "La columna 'pass' se ha modificado correctamente.";
} else {
    echo "Error al modificar la columna: " . $conexion->error;
}

echo "<br>";

$passHash = "admin1234";
$qsl = "INSERT INTO alumnos (id, nombre, email, pass, edad) VALUES (?,?,?,?,?)";
$prepared = $conexion->prepare($qsl);
$prepared->bind_param("ssssi", $id, $nombre, $email, $pass, $edad);

$id="123";
$nombre = "Juan";
$email = "juan@gmail.com";
$edad = 25;
$pass = password_hash($passHash, PASSWORD_DEFAULT);
//PASSWORD_DEFAULT es el algoritmo de hash que se utiliza por defecto en PHP

// lo comentamos para que no de errores cada vez que lo volvamos a ejecutar $prepared->execute();


//Esto la parte de registro (login en el formulario)

$passVisibleIncorrecta="admin12345";
$passVisibleCorrecta="admin1234";
$user = "juan@gmail.com";


//Recojo de la BS la info que encesitamos
$sql ="SELECT pass FROM alumnos WHERE email = ?";
$prepared=$conexion->prepare($sql);
$prepared->bind_param("s", $user);
$prepared->execute();
$resultado = $prepared->get_result();
if ($resultado->num_rows > 0) {
    echo "El usuario existe";
    echo "<br>";
    $fila = $resultado->fetch_assoc();

    //Leemos el hash de la base de datos. Accedemos a la columna 'pass':
    $passAlmacenada = $fila['pass'];
    //Comprobamos si el hash de la base de datos coincide con el hash del usuario
    if (password_verify($passVisibleCorrecta, $passAlmacenada)) {
        echo "El usuario y la contraseña son correctos";
        } else {
            echo "El usuario y la contraseña son incorrectos";
            }
        } else{
                echo "El usuario no existe";

}
?>
    
</body>
</html>