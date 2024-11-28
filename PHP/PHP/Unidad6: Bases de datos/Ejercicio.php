<?php
include_once("./funcionesBD.php");
session_start();

$email = $password = $password2 = "";
$emailErr = $passwordErr = $password2Err = "";
$errores = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    if (empty($email)) {
        $emailErr = "Se requiere email";
        $errores = true;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Formato de email inválido.";
        $errores = true;
    }

    if (empty($password)) {
        $passwordErr = "Se requiere contraseña";
        $errores = true;
    }

    if (empty($password2)) {
        $password2Err = "Se requiere repetir la contraseña";
        $errores = true;
    } elseif ($password !== $password2) {
        $password2Err = "Las contraseñas no coinciden";
        $errores = true;
    }

    if (!$errores) {
        $conexion = conectar();
        createNewTable($conexion);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        insertarDatos($email, $hashedPassword);
        echo "<p>Registro exitoso.</p>";

        $conexion->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <fieldset>
            <legend>Registro de Usuario</legend>
            <label>Email: *</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            <span style="color:red;"><?php echo $emailErr; ?></span>
            <br>

            <label>Contraseña: *</label>
            <input type="password" name="password" required>
            <span style="color:red;"><?php echo $passwordErr; ?></span>
            <br>

            <label>Repite la contraseña: *</label>
            <input type="password" name="password2" required>
            <span style="color:red;"><?php echo $password2Err; ?></span>
            <br>

            <input type="submit" name="enviar" value="Enviar">
            <input type="reset" name="restablecer" value="Borrar">
        </fieldset>
    </form>
</body>
</html>