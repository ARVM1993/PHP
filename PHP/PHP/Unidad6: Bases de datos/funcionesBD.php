<?php

function conectar(){
    $user = "root";
    $server= "127.0.0.1";
    $password = "Sandia4you";
    $db = "daw";

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $conn = new mysqli($server, $user, $password, $db);
        $conn->set_charset("utf8mb4"); 
        return $conn;
    } catch (mysqli_sql_exception $e) {
        die("Error de conexión a la base de datos: " . $e->getMessage());
    }
}
function createNewTable(){
    $sql = "CREATE TABLE IF NOT EXISTS users (
        email VARCHAR(200) NOT NULL,
        password VARCHAR(255) NOT NULL
    )";
    $conexion = conectar(); 

    if (!$conexion->query($sql)) { 
        echo "Error creando la tabla: " . $conexion->error;
    } else {
        echo "Tabla creada o ya existe.";
    }

    $conexion->close(); 
}

//Descripcion de la funcion (nombre y descripcion)
/** Datos por cada parametro y que devuelve
 * @param mixed $email 
 * @param mixed $pass
 * @return bool
 */

function insertarDatos($email, $password){
    $sql = "INSERT INTO users (email, password) VALUES (?, ?)"; 
    $conexion = conectar(); 
    $statement = $conexion->prepare($sql); 
    $statement->bind_param("ss", $email, $password);

    return $statement->execute();
 
}
?>