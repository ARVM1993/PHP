<?php

$name =$surname =$email =$dni =$password =$password2 =$lectura="";
$nameErr=$surnameErr=$dniErr=$passwordErr=$password2Err=$lecturaErr="";
$errores = false;

if ($_SERVER["REQUEST_METHOD"]= "POST") {
    $name =$_POST["name"];
    $surname =$_POST["surname"];
    $email =$_POST["email"];
    $dni =$_POST["dni"];
    $password =$_POST["password"];
    $password2 =$_POST["password2"];
    $lectura =$_POST["lectura"];
    $accept = isset($_POST["accept"]) ? $_POST["accept"] : "";

    if (empty($name)){
        $nameErr="Se requiere nombre";
        $errores = true;
    } elseif (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]*$/", $name)) {
        $nameErr="Solo se permiten letras";
        $errores = true;
    }
    if(empty($email)){
        $ageErr ="Se requiere correo";
        $errores=true;
    }
    if (empty($dni)) {
        $dniErr = "Se requiere DNI";
        $errores = true;
    } eleif (!preg_match("/^[0-9]{8}$/", $dni)) {
        $dniErr = "Solo se permiten 8 números";
        $errores = true;
    }
  
    if (empty($password)) {
        $passwordErr = "Se requiere contraseña";
        $errores = true;

    }elseif (strlen($password) < 8 || !preg_match("/^[a-zA-Z!#$%&\/()=]+$/", $password)) {
        $passwordErr = "La contraseña debe tener al menos 8 caracteres";
        
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


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="post">
    <table border=1>
        <tr>
            <td><label>Nombre</label></td>
            <td><input type="text" name="name" placeholder="Nombre..."></td>
        </tr>
        <tr>
            <td><label>Apellidos</label></td>
            <td><input type="text" name="surname" placeholder="Apellido..."></td>
        </tr>
        <tr>
            <td><label>Email</label></td>
            <td><input type="email" name="email" placeholder="ej: mibiblioteca@gmail.com"></td>
        </tr>
        <tr>
            <td><label>DNI</label></td>
            <td><input type="text" name="dni"></td>
        </tr>
        <tr>
            <td><label>Contraseña</label></td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td><label>Confirmar Contraseña</label></td>
            <td><input type="password" name="password2"></td>
        </tr>
        <tr>
            <td><label>Asiduidad a la biblioteca</label></td>
            <td>
                <select  name="lectura" id="lectura">
                    <option value="De vez en cuando">De vez en cuando</option>
                    <option value="Con frecuencia">Con frecuencia</option>
                    <option value="Una vez a la semana">Una vez a la semana</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan = "2"><label>Quieres recibir notificaciones</label>
            <input type="checkbox" name="accept"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Enviar">
            </td>
        </tr>
    </table>
</form>

    
</body>
</html>