<?php 
$user = "root";
$server="127.0.0.1";
$password="Sandia4you";
$db="daw";
//puerto: si hubiesemos cambiado de puerto
//socket (canal de comunicaicon entre dos elementos distribuidos por TCP o SCP): si quisieramos
$conexion = new mysqli($server, $user, $password, $db);
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
    }
    //echo "Conexión exitosa";
    $sql = "SELECT * FROM alumnos";
    $result = $conexion->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Nombre: " . $row["nombre"] . " " 
            . " - Email: " . $row["email"]. " - Contraseña: " . $row["password"]. "<br>";   
        }
            
        } else {
            echo "0 results";
        }
        $conexion->close();
?>