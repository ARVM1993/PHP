<?php
include_once $_SERVER ["DOCUMENT_ROOT"] . "/model/User.php";

function conectarBD(){
    $server = "127.0.0.1";
    $user = "root";
    $password = "Sandia4you";
    $db = "proyecto";

    $conexion = new mysqli($server, $user, $password, $db);

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    } else {
        return $conexion;
    }
}

function createTableUsuario(){
    $conexion = conectarBD();
    $sql = "CREATE TABLE IF NOT EXISTS usuario (
                id INT PRIMARY KEY AUTO_INCREMENT,
                nickname VARCHAR(50),
                pass VARCHAR(255),
                email VARCHAR(50)
            )";
    if (mysqli_query($conexion, $sql)) {
        echo "Tabla 'usuario' creada correctamente.";
    } else {
        echo "Error al crear la tabla 'usuario': " . mysqli_error($conexion);
    }
}

function createTableMage(){
    $conexion = conectarBD();
    $sql = "CREATE TABLE IF NOT EXISTS mage (
                name VARCHAR(50),
                hp INT,
                damage INT,
                lvl INT,
                numBattle INT,
                dodge BOOLEAN,
                health INT,
                id_user INT,
                FOREIGN KEY (id_user) REFERENCES usuario(id),
                id INT PRIMARY KEY AUTO_INCREMENT
            )";
    if (mysqli_query($conexion, $sql)) {
        echo "Tabla 'mage' creada correctamente.";
    } else {
        echo "Error al crear la tabla 'mage': " . mysqli_error($conexion);
    }
}

function createTableJuggernaut(){
    $conexion = conectarBD();
    $sql = "CREATE TABLE IF NOT EXISTS juggernaut (
                name VARCHAR(50),
                hp INT,
                damage INT,
                lvl INT,
                numBattle INT,
                resistance INT,
                id_user INT,
                FOREIGN KEY (id_user) REFERENCES usuario(id),
                id INT PRIMARY KEY AUTO_INCREMENT
            )";
    if (mysqli_query($conexion, $sql)) {
        echo "Tabla 'juggernaut' creada correctamente.";
    } else {
        echo "Error al crear la tabla 'juggernaut': " . mysqli_error($conexion);
    }
}

function createTableWarrior(){
    $conexion = conectarBD();
    $sql = "CREATE TABLE IF NOT EXISTS warrior (
                name VARCHAR(50),
                hp INT,
                damage INT,
                lvl INT,
                numBattle INT,
                weapon VARCHAR(10),
                id_user INT,
                FOREIGN KEY (id_user) REFERENCES usuario(id) ON DELETE CASCADE,
                id INT PRIMARY KEY AUTO_INCREMENT
            )";
    if (mysqli_query($conexion, $sql)) {
        echo "Tabla 'warrior' creada correctamente.";
    } else {
        echo "Error al crear la tabla 'warrior': " . mysqli_error($conexion);
    }
}
