<?php 
$user = "root";
$server= "127.0.0.1";
$password = "Sandia4you";
$db = "daw";

$conexion = new mysqli($server, $user, $password, $db);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
echo "Conexión exitosa<br>";

$sql = "SELECT * FROM alumnos";
$result = $conexion->query($sql);

// Display results from the SELECT query
if ($result && $result->num_rows > 0) {
    echo "Datos actuales en la tabla 'alumnos':<br>";
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nombre: " . $row["nombre"] . " - Email: " . $row["email"] . " - Contraseña: " . $row["password"] . "<br>";
    }
} else {
    echo "No se encontraron datos.<br>";
}

$sql = "UPDATE alumnos SET nombre = 'Aitor' WHERE id = 12345678";
if ($conexion->query($sql) === TRUE) {
    echo "Se han actualizado " . $conexion->affected_rows . " fila(s).<br>";
} else {
    echo "Error al actualizar: " . $conexion->error . "<br>";
}

$sql = "INSERT INTO alumnos (id, nombre, email, password, edad) VALUES (?, ?, ?, ?, ?)";
$prepared = $conexion->prepare($sql);

if ($prepared) {
    $id = "444";
    $nombre = "Juan";
    $email = "juan@gmail.com";
    $password = "123";
    $edad = 25;

    $prepared->bind_param("ssssi", $id, $nombre, $email, $password, $edad);



    $prepared->close();
} else {
    echo "Error al preparar la consulta: " . $conexion->error . "<br>";
}

function mayorDe18($conexion) {
    $sql = "SELECT * FROM alumnos WHERE edad > 18";
    $result = $conexion->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "Alumnos mayores de 18 años:<br>";
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . " - Nombre: " . $row["nombre"] . " - Edad: " . $row["edad"] . "<br>";
        }
    } else {
        echo "No hay alumnos mayores de 18 años.<br>";
    }
}

function buscarMayoresEdad($conexion, $edad) {
    $sql = "SELECT * FROM alumnos WHERE edad > ?";
    $statement = $conexion->prepare($sql);

    if ($statement) {
        $statement->bind_param("i", $edad);
        $statement->execute();

        //Con los SELECT necesito recoger el mysqli_result con get_result
        $result = $statement->get_result();

        

        if ($result && $result->num_rows > 0) {
            echo "Alumnos mayores de $edad años:<br>";
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"] . " - Nombre: " . $row["nombre"] . " - Edad: " . $row["edad"] . "<br>";
            }
        } else {
            echo "No hay alumnos mayores de $edad años.<br>";
        }
        $statement->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error . "<br>";
    }
}

mayorDe18($conexion);
buscarMayoresEdad($conexion, 20);

$conexion->close();
?>
