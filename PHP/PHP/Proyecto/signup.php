<?php

$email=$password=$password2=$age=$lectura="";
$emailErr=$passwordErr=$password2Err=$ageErr=$lecturaErr="";
$errores= false;

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $email=htmlspecialchars($_POST["email"]);
    $password=htmlspecialchars($_POST["password"]);
    $password2=htmlspecialchars($_POST["password2"]);
    $age=htmlspecialchars($_POST["age"]);
    $lectura=$_POST["lectura"]; //variable options
    $accept=isset($_POST["accept"]) ? $_POST["accept"] : "";
    

    if (!empty($email)) {
        $emailErr = "No puedes dejar vacio el email";
        $errores=true;
        
    }
    if (!empty($password)) {
        $passwordErr="No puedes dejar vacia la contraseña";
        $errores=true;
    }
    if (!empty($password2)) {
        $password2Err="No puedes dejar vacia la contraseña";
        $errores=true;
    } elseif($password != $password2){
        $password2Err="Las contraseñas no coinciden";
        $errores=true;
    }

    if(!$errores){
        echo "Formulario enviado correctamente";
    }


}
?>

<?php include "./partes/menu.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method ="POST" action="<?= $_SERVER["PHP_SELF"];?>">
    <table border="1">
        <tr>
            <td><label>Email:*</label></td>
            <td>
                <input type="email" name="email" value="<?php echo htmlspecialchars($email)?>">
            </td>
        </tr>
        <tr>
            <td><label>Contraseña:*</label></td>
            <td><input type="password" name="password" value="<?=$password?>">
            </td>
        </tr>
        <tr>
            <td><label>Repetir contrasela:*</label></td>
            <td><input type="password" name="password2">
            </td>
        </tr>
        <tr>
            <td><label>Edad:</label></td>
            <td><input type="number" name="age">
            </td>
        </tr>
        <tr>
            <td><label>Genero</label>
            </td>
            <td>
                <Select name="lectura" id="lectura">
                    <option value="" disabled selected>Selecciona genero favorito</option>
                    <option value="Misterio">Misterio</option>
                    <option value="Romantica">Romantica</option>
                    <option value="Aventuras">Aventuras</option>
                </Select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label>Acepto condiciones</label> <input type="checkbox" name="accept" <?=isset($accept) && $accept ? "checked" : "" ?>>
            </td>

        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Enviar">
            <input type="reset" value="Borrar"></td>
        </tr>
</table>


</form>
<?php include "./partes/pie.php"?>
</body>
</html>
