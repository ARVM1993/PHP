<?php

function conectarBD(){
    $server="127.0.0.1";
    $user= "root";
    $password="Sandia4you";
    $db = "instituto";

    $conexion = new mysqli($server, $user, $password, $db);

    if ($conexion->connect_error) {
        echo ("Conexion fallida");
    } else {
        return $conexion;
    }
}

function crearTabla(){
    $conexion = conectarBD();
    $sql = "CREATE TABLE IF NOT EXISTS `alumnado`(
    id VARCHAR (10) PRIMARY KEY,
    nombre VARCHAR (20) NOT NULL,
    edad INT,
    matriculado BOOLEAN
    )";

    if (!$conexion->query($sql)){
        echo "Error al crear la tabla" . $conexion->error;

    }

    $sql = "CREATE TABLE IF NOT EXISTS `profesorado`(
    id VARCHAR (10) PRIMARY KEY,
    nombre VARCHAR (20) NOT NULL,
    departamento VARCHAR (20),
    interino BOOLEAN
    )";

    if (!$conexion->query($sql)) {
        echo "Error al crear la tabla " . $conexion->error;
    }

    $sql = "CREATE TABLE IF NOT EXISTS `alumnado_profesorado`(
    id_alumno VARCHAR (10),
    id_profesor VARCHAR (10),
    PRIMARY KEY (id_alumno, id_profesor),
    FOREIGN KEY (id_alumno) REFERENCES alumnado(id) ON DELETE CASCADE,
    FOREIGN KEY (id_profesor) REFERENCES profesorado(id) ON DELETE CASCADE
    )";

    if (!$conexion->query($sql)) {
        echo "Error al crear la tabla " . $conexion->error;
    
    }
}

function insertarAlumno(Alumno $alumno) {
    $conexion = conectarBD(); 
    crearTabla(); 

    $sql = "INSERT INTO `alumnado` (id, nombre, edad, matriculado) VALUES (?,?,?,?)";
    $stmt = $conexion->prepare($sql); 

    if ($stmt === false) {
        echo "Error al preparar la consulta: " . $conexion->error;
    }

    $stmt->bind_param(
        "ssis", 
        $alumno->getId(),
        $alumno->getNombre(),
        $alumno->getEdad(),
        $alumno->getMatriculado()
    );

    if (!$stmt->execute()) {
        echo "Error al insertar el alumno: " . $stmt->error;
    } else {
        echo "Alumno insertado correctamente.";
    }

    $stmt->close();
    $conexion->close();
}

function insertarProfesor(Profesorado $profesor) {
    $conexion = conectarBD();
    crearTabla();
    $sql = "INSERT INTO `profesorado` (id, nombre, departamento, interino) VALUES (?,?,?,?);";
    $stmt = $conexion->prepare($sql);
    if ($stml=== false) {
        echo "Error al preparar la consulta: " . $conexion->error;
    }
    $stmt->bind_param("ssss",
    $profesor->getId(),
    $profesor->getNombre(),
    $profesor->getDepartamento(),
    $profesor->getInterino()
    );

    if (!$stmt->execute()) {
        echo "Error al preparar la consulta " .  $conexion->error;
    } else{
        echo "Profesor insertado correctamente";
    }

    $stmt->close();
    $conexion->close();

}