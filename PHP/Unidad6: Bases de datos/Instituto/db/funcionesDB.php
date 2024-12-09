<?php

include $_SERVER['DOCUMENT_ROOT'] . "/Instituto/clases/alumnado.php";
include $_SERVER['DOCUMENT_ROOT'] . "/Instituto/clases/profesorado.php";

function conectarBD(){
    $server = "127.0.0.1";
    $user = "root";
    $password = "Sandia4you";
    $db = "instituto";

    $conexion = new mysqli($server, $user, $password, $db);

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    } else {
        return $conexion;
    }
}

function crearTabla(){
    $conexion = conectarBD();

    $sqls = [
        "CREATE TABLE IF NOT EXISTS `alumnado` (
            id VARCHAR(10) PRIMARY KEY,
            nombre VARCHAR(20) NOT NULL,
            edad INT,
            matriculado BOOLEAN
        )",
        "CREATE TABLE IF NOT EXISTS `profesorado` (
            id VARCHAR(10) PRIMARY KEY,
            nombre VARCHAR(20) NOT NULL,
            departamento VARCHAR(20),
            interino BOOLEAN
        )",
        "CREATE TABLE IF NOT EXISTS `alumnado_profesorado` (
            id_alumno VARCHAR(10),
            id_profesor VARCHAR(10),
            PRIMARY KEY (id_alumno, id_profesor),
            FOREIGN KEY (id_alumno) REFERENCES alumnado(id) ON DELETE CASCADE,
            FOREIGN KEY (id_profesor) REFERENCES profesorado(id) ON DELETE CASCADE
        )"
    ];

    foreach ($sqls as $sql) {
        if (!$conexion->query($sql)) {
            echo "Error al crear la tabla: " . $conexion->error . "<br>";
        }
    }
    $conexion->close();
}

function insertarAlumno($alumno) {
    $conexion = conectarBD(); 
    $sql = "INSERT INTO `alumnado` (id, nombre, edad, matriculado) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql); 

    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    $id = $alumno->getId();
    $nombre = $alumno->getNombre();
    $edad = $alumno->getEdad();
    $matriculado = $alumno->getMatriculado();

    $stmt->bind_param("ssis", $id, $nombre, $edad, $matriculado);

    if (!$stmt->execute()) {
        echo "Error al insertar el alumno: " . $stmt->error . "<br>";
    } else {
        echo "Alumno insertado correctamente.<br>";
    }

    $stmt->close();
    $conexion->close();
}

function insertarProfesor($profesor) {
    $conexion = conectarBD();
    $sql = "INSERT INTO `profesorado` (id, nombre, departamento, interino) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    $id = $profesor->getId();
    $nombre = $profesor->getNombre();
    $departamento = $profesor->getDepartamento();
    $interino = $profesor->getInterino();

    $stmt->bind_param("sssi", $id, $nombre, $departamento, $interino);

    if (!$stmt->execute()) {
        echo "Error al insertar el profesor: " . $stmt->error . "<br>";
    } else {
        echo "Profesor insertado correctamente.<br>";
    }

    $stmt->close();
    $conexion->close();
}

function insertarAlumnadoProfesorado($profesor, $alumno){
    $conexion = conectarBD();

    $sql = "INSERT INTO `alumnado_profesorado` (alumno_id, profesor_id) VALUES (?, ?)";
    $stmt = $conexion->prepare($sql);

    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    $id_profesor = $profesor->getId();
    $id_alumno = $alumno->getId();

    $stmt->bind_param("ss", $id_alumno, $id_profesor);
    if (!$stmt->execute()) {
        echo "Error al insertar el ID: " . $stmt->error . "<br>";
    } else {
        echo "ID insertados correctamente. <br>";
    }

    $stmt->close();
    $conexion->close();
}


crearTabla();
$profesor = new Profesorado("110", "Sete", "DAW", false);
insertarProfesor($profesor);
$alumno = new Alumnado("255", "Aitor", 31, true);
insertarAlumno($alumno);
insertarAlumnadoProfesorado($profesor, $alumno);