<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>


        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        span{
            color: red;
            text-align: center;
        }

    </style>
</head>
<body>
    <?php 
    // Configuración de conexión
    $user = "root";
    $server= "127.0.0.1";
    $password = "Sandia4you";
    $db = "daw";

    // Crear conexión
    $conexion = new mysqli($server, $user, $password, $db);

    // Verificar conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    echo "Conexión exitosa<br>";

    // Actualizar datos en la tabla
    $sql_update = "UPDATE alumnos SET nombre = 'Aitor' WHERE id = '12345678'";
    if ($conexion->query($sql_update) === TRUE) {
        echo "<span>Registro actualizado correctamente</span><br>";
    } else {
        echo "Error al actualizar: " . $conexion->error . "<br>";
    }

    // Obtener datos de la tabla
    $sql_select = "SELECT * FROM alumnos";
    $result = $conexion->query($sql_select);

    if ($result->num_rows > 0) {
        // Mostrar resultados en una tabla
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Contraseña</th></tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . ($row["id"]) . "</td>";
            echo "<td>" . ($row["nombre"]) . "</td>";
            echo "<td>" . ($row["email"]) . "</td>";
            echo "<td>" . ($row["password"]) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron resultados";
    }

    // Cerrar conexión
    $conexion->close();
    ?>
</body>
</html>
