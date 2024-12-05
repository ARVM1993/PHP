<?php
session_start();

$email = $password = "";
$emailErr = $passwordErr = "";
$errores = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $password = $_POST["password"];

    if (empty($email)) {
        $emailErr = "Se requiere correo";
        $errores = true;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "El correo no es válido";
        $errores = true;
    }

    if (empty($password)) {
        $passwordErr = "Se requiere contraseña";
        $errores = true;
    }

    if (!$errores) {
        header("Location: index.php");
        exit();
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
    <title>Login</title>
</head>
<body>

<?php
if ($errores) {
    echo "<div class='error-message'>Por favor, rellena todos los campos correctamente</div>";
}
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <table>
        <tr>
            <td><label>Email</label></td>
            <td>
                <input type="email" name="email" placeholder="ej: mibiblioteca@gmail.com" value="<?= htmlspecialchars($email) ?>">
                <span style="color: red;"><?= $emailErr ?></span>
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
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Iniciar sesión">
                <input type="reset" value="Borrar">
            </td>
        </tr>
    </table>
</form>

<?php include 'partes/pie.php'; ?>

</body>
</html>
