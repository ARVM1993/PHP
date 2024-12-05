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

buscarNombre($conexion, "Aitor");
function buscarNombre($conexion, $nombre){
    //Esto funcionaria, pero es mala practica porque da pie a injeccion de codigo
    //$sql = "SELECT * FROM alumnos WHERE nombre = $nombre";
    $sql = "SELECT nombre, email, pass FROM alumnos WHERE nombre = ?";
    
    //1. Mandamos a la BD:

    $statement = $conexion->prepare($sql);
    //statement es un objeto mysqli_stmt (es una declaracion)

    //2. Hacemos bind
    $statement->bind_param("s", $nombre);
    //bind_param es un metodo del objeto statement que nos permite pasar los datos a la BD

    /* 3. Aseginar valores a la variable pero como ya lo tenemos por parametro no hace falta
    si no, tendría que ser: $nombre = "Sara"; */


    // 4. Lanzarla a la BD

    $statement->execute();

    //5. En el caso de SELECT: tengo que hacer fetch para obtener los datos
    $result = $statement->get_result();
    echo "<ol>";
    while ($fila =$result->fetch_assoc()) {
        echo "<li>".$fila["nombre"]."</li>";

    }
    echo "</ol>";
}
echo "<br>";
function modificarNombre ($conexion, $nombreAntiguo, $nombreNuevo){
    $sql = "UPDATE alumnos SET nombre = ? WHERE nombre = ?";
    $statement = $conexion->prepare($sql);
    $statement->bind_param("ss", $nombreNuevo, $nombreAntiguo);
    $statement->execute();
    echo "Nombre modificado con exito";
    echo "<br>";

    if ($statement->execute()) {
        if ($statement->affected_rows > 0) {
            echo "Actualizadas " . $statement->affected_rows . " filas";
        } else{
            echo "No se ha modificado nada";
        }
    }
}

    modificarNombre($conexion, "Sara", "Juan");

?>
</body>
</html>