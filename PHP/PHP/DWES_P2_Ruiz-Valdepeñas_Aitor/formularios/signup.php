<?php
session_start();

$name = $surname = $email = $age = $dni = $password = $password2 = $lectura = "";
$nameErr = $surnameErr = $emailErr = $ageErr = $dniErr = $passwordErr = $password2Err = $lecturaErr = "";
$errores = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $surname = htmlspecialchars($_POST["surname"]);
    $email = htmlspecialchars($_POST["email"]);
    $dni = htmlspecialchars($_POST["dni"]);
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $lectura = $_POST["lectura"];
    $accept = isset($_POST["accept"]) ? $_POST["accept"] : "";  

    if (!empty($_POST["name"]) && !preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]*$/", $name)) {
        $nameErr = "Solo se permiten letras";
        $errores = true;
    }

    if (empty($_POST["email"])) {
        $emailErr = "Se requiere correo";
        $errores = true;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "El correo no es válido";
        $errores = true;
    }

    if (!empty($_POST["age"]) && $_POST["age"] < 18) {
        $ageErr = "Debes tener por lo menos 18 años";
        $errores = true;
    }

    if (!empty($_POST["dni"]) && !preg_match("/^\d{8}[A-Za-z]$/", $dni)) {
        $dniErr = "El DNI debe tener 8 números seguidos de una letra";
        $errores = true;
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Se requiere contraseña";
        $errores = true;
    } elseif (strlen($password) < 8 || !preg_match("/[a-zA-Z!#$%&\/()=]+/", $password)) {
        $passwordErr = "La contraseña debe tener al menos 8 caracteres y contener letras y caracteres especiales";
        $errores = true;
    }

    if (empty($_POST["password2"])) {
        $password2Err = "Se requiere repetir la contraseña";
        $errores = true;
    } elseif ($password !== $password2) {
        $password2Err = "Las contraseñas no coinciden";
        $errores = true;
    }

    if (!$errores) {
        echo "<div class='success-message'><p>Registro exitoso: Nombre: $name, Apellido: $surname, Email: $email, DNI: $dni, Lectura: $lectura</p></div>";
    }
}
?>
<?php include 'partes/menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../estilos/estiloSignUp.css">
    <link rel="stylesheet" type="text/css" href="../estilos/estilo.css">
    <title>Registro</title>
</head>
<body>

<?php
if ($errores) {
    echo "<div class='error-message'>No has completado todos los campos correctamente</div>";
}
?>

<form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
    <table>
        <tr>
            <td><label>Nombre</label></td>
            <td>
                <input type="text" name="name" placeholder="Nombre..." value="<?= htmlspecialchars($name) ?>">
                <span style="color: red;"><?= $nameErr ?></span>
            </td>
        </tr>
        <tr>
            <td><label>Apellidos</label></td>
            <td>
                <input type="text" name="surname" placeholder="Apellido..." value="<?= htmlspecialchars($surname) ?>">
                <span style="color: red;"><?= $surnameErr ?></span>
            </td>
        </tr>
        <tr>
            <td><label>Edad</label></td>
            <td>
                <input type="number" name="age" value="<?= htmlspecialchars($age) ?>">
                <span style="color: red;"><?= $ageErr ?></span>
            </td>
        </tr>
        <tr>
            <td><label>Email</label></td>
            <td>
                <input type="email" name="email" placeholder="ej: mibiblioteca@gmail.com" value="<?= htmlspecialchars($email) ?>">
                <span style="color: red;"><?= $emailErr ?></span>
            </td>
        </tr>
        <tr>
            <td><label>DNI</label></td>
            <td>
                <input type="text" name="dni" value="<?= htmlspecialchars($dni) ?>">
                <span style="color: red;"><?= $dniErr ?></span>
            </td>
        </tr>
        <tr>
            <td><label>Contraseña</label></td>
            <td>
                <input type="password" name="password">
                <span style="color: red;"><?= $passwordErr ?></span>
            </td>
        </tr>
        <tr>
            <td><label>Confirmar Contraseña</label></td>
            <td>
                <input type="password" name="password2">
                <span style="color: red;"><?= $password2Err ?></span>
            </td>
        </tr>
        <tr>
            <td><label>Asiduidad a la biblioteca</label></td>
            <td>
                <select name="lectura" id="lectura">
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="De vez en cuando" <?= $lectura == "De vez en cuando" ? "selected" : "" ?>>De vez en cuando</option>
                    <option value="Con frecuencia" <?= $lectura == "Con frecuencia" ? "selected" : "" ?>>Con frecuencia</option>
                    <option value="Una vez a la semana" <?= $lectura == "Una vez a la semana" ? "selected" : "" ?>>Una vez a la semana</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><label>Aceptar condiciones</label>
                <input type="checkbox" name="accept" <?= isset($accept) && $accept ? "checked" : "" ?>>
                <span style="color: red;"><?= $acceptErr ?></span>
            </td>
        </tr>
        <tr>
        <td colspan="2">
                <input type="submit" value="Enviar">
                <input type="reset" value="Borrar">
            </td>
        </tr>
    </table>
</form>
<?php include 'partes/pie.php'; ?>
</body>
</html>
