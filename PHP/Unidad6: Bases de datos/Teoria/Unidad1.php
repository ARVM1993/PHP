<?php 
$user = "root";
$server= "127.0.0.1";
$password = "Sandia4you";
$db = "daw";
//puerto: si hubiesemos cambiado de puerto
//socket (canal de comunicaicon entre dos elementos distribuidos por TCP o SCP): si quisieramos
$conexion = new mysqli($server, $user, $password, $db);

/*si quisieramos crear aqui la tabla en una variable:
$sql = "create table alumnos(
id varchar(50) primary key...)"*/

/*Estamos trabajando con POO entonces podemos utilizar funciones internas de mysql
if ($conexion->query($sql)){
echo "La tabla se ha ejecutado correctamente";
}else{
echo "No ha funcionado;
}
*/ 
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
    }
    //echo "Conexión exitosa";
    $sql = "SELECT * FROM alumnos";
    $result = $conexion->query($sql);
    echo "se han insertado " . $conexion->affected_rows . " filas ";
    $sql = "UPDATE alumnos SET nombre = 'Aitor' WHERE id = 12345678";
    $result = $conexion->query($sql);

    echo "<br>";
    
        
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Nombre: " . $row["nombre"] . " " 
            . " - Email: " . $row["email"]. " - Contraseña: " . $row["password"]. "<br>";   
        }
            
    
//SENTENCIAS PREPARADAS

$sql= "INSERT INTO alumnos (id, nombre, email, password, edad)
    VALUES (?,?,?,?,?)"; //una interrogacion por cada de las variables que aun no conocemos

    // 1. Enviamos el sqlpreparado a la base de datos y me devuelve un objeto de la clsae mysqli_stmt

    $prepared = $conexion->prepare($sql);

    // 2. Bind: asigna variables a cada ?

    $prepared ->bind_param("ssssi", $id, $nombre, $email, $pasword, $edad);

    // 3. Bind: asigna variables a cada ?
    $id = "444";
    $nombre = "Juan";
    $email = "juan@gmail.com";
    $password = "123";
    $edad = 25;

    // 4. Lanzar la consulta

    $prepared->execute();

    function mayorDe18(): mysqli_result{
        $sql = "SELECT * FROM alumnos WHERE edad > 18";
        
    }

    function buscarMayoresEdad($edad){
        $sql = "SELECT * FROM alumnos WHERE edad > $edad";

    }

?>