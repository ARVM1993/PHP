<?php

include $_SERVER['DOCUMENT_ROOT'] . "/clases/oveja.php";
include $_SERVER['DOCUMENT_ROOT'] . "/clases/vaca.php";


function conectarBD(){
    
    $user = "root";
    $server = "127.0.0.1";
    $pass = "Sandia4you";
    $db = "daw";
    
    $conexion = new mysqli($server, $user, $pass, $db);
    
    if ($conexion->connect_error) {
        echo ("Conexión fallid");
    }
    
    return $conexion;
}

function crearTabla(){
    $conexion = conectarBD();

    $sql = "CREATE TABLE IF NOT EXISTS `ovejas` (
        id VARCHAR(50),
        peso INT,
        especie VARCHAR(50),
        enferma BOOLEAN
    )";
    if (!$conexion->query($sql)) {
        echo "Error al crear la tabla 'ovejas': " . $conexion->error;
    }

    $sql = "CREATE TABLE IF NOT EXISTS `vacas` (
        id VARCHAR(50),
        peso INT
    )";
    if (!$conexion->query($sql)) {
        echo "Error al crear la tabla 'vacas': " . $conexion->error;
    }

    $conexion->close();
}

function guardarOveja(Oveja $oveja){
    $conexion = conectarBD();
    crearTabla();

    $sql = "INSERT INTO `nuevaOveja` (id, peso, especie, enferma) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    $stmt->bind_param("siss", $oveja->getId(), $oveja->getPeso(), $oveja->getEspecie(), $oveja->getEnferma());

    if (!$stmt->execute()) {
        echo "Error al insertar la oveja: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}

function guardarVaca(Vaca $vaca){
    $conexion = conectarBD();
    crearTabla();

    $sql = "INSERT INTO `vacas` (id, peso) VALUES (?, ?)";
    $stmt = $conexion->prepare($sql);
    
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    $stmt->bind_param("si", $vaca->getId(), $vaca->getPeso());

    if (!$stmt->execute()) {
        echo "Error al insertar la vaca: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}