<?php
session_start(); // Iniciar la sesión para almacenar usuarios

// Clase User para almacenar los datos del usuario
class User {
    public $name;
    public $password;
    public $ageGroup;
    public $registrationDate;

    public function __construct($name, $password, $ageGroup) {
        $this->name = $name;
        $this->password = $password;
        $this->ageGroup = $ageGroup;
        $this->registrationDate = date("Y-m-d H:i:s"); // Fecha y hora actuales
    }
}

// Inicializar array de usuarios en sesión si no existe
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

// Variables y errores inicializados
$name = $age = $password = $password2 = $accept = "";
$nameErr = $ageErr = $passwordErr = $password2Err = $acceptErr = "";
$errores = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $accept = isset($_POST["accept"]) ? $_POST["accept"] : "";

    if (empty($name)) {
        $nameErr = "Se requiere nombre";
        $errores = true;
    } elseif (!preg_match("/^[a-zA-ZñÑ]*$/", $name)) { 
        $nameErr = "Solo puedes utilizar letras";
        $errores = true;
    }

    if (empty($age)) {
        $ageErr = "Se requiere edad";
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

    if (empty($accept)) {
        $acceptErr = "Debes aceptar las condiciones";
        $errores = true;
    }

    // Si no hay errores, crear el objeto User y agregarlo a la lista de usuarios
    if (!$errores) {
        $newUser = new User($name, $password, $age);
        $_SESSION['users'][] = $newUser; // Añadir el nuevo usuario al array en sesión
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

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Nombre: *</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
        <span style="color:red;"><?php echo $nameErr; ?></span>
        <br>

        <label>Contraseña: *</label>
        <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>">
        <span style="color:red;"><?php echo $passwordErr; ?></span>
        <br>

        <label>Repite la contraseña: *</label>
        <input type="password" name="password2" value="<?php echo htmlspecialchars($password2); ?>">
        <span style="color:red;"><?php echo $password2Err; ?></span>
        <br>

        <label for="edad">Grupo de edad: *</label>
        <select name="age" id="age">
            <option value="" <?php if ($age == "") echo "selected"; ?> disabled>Selecciona tu grupo de edad</option>
            <option value="Menor de edad" <?php if ($age == "Menor de edad") echo "selected"; ?>>Menor de edad</option>
            <option value="Entre 18 y 65" <?php if ($age == "Entre 18 y 65") echo "selected"; ?>>Entre 18 y 65</option>
            <option value="Mayor de 65" <?php if ($age == "Mayor de 65") echo "selected"; ?>>Mayor de 65</option>
        </select>
        <span style="color:red;"><?php echo $ageErr; ?></span>
        <br>

        <label>
            <input type="checkbox" name="accept" <?php if ($accept) echo "checked"; ?>>
            Acepto las condiciones de uso
        </label>
        <span style="color:red;"><?php echo $acceptErr; ?></span>
        <br>

        <input type="submit" name="enviar" value="Enviar">
        <input type="reset" name="restablecer" value="Borrar">
    </form>

    <h2>Usuarios Registrados:</h2>
    <ul>
        <?php
        // Mostrar la lista de usuarios registrados
        if (!empty($_SESSION['users'])) {
            foreach ($_SESSION['users'] as $user) {
                echo "<li>Nombre: " . htmlspecialchars($user->name) . 
                     ", Edad: " . htmlspecialchars($user->ageGroup) . 
                     ", Fecha de Registro: " . htmlspecialchars($user->registrationDate) . "</li>";
            }
        } else {
            echo "<li>No hay usuarios registrados.</li>";
        }
        ?>
    </ul>
</body>
</html>