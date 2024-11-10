<?php
include_once "./partes/menu.php";
$email = $password="";
$emailErr = $passwordErr = "";
$errores=true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
}


$_SERVER["PHP_SELF"];// action="<?=$_SERVER["PHP_SELF"]>?;">
$_SERVER["REQUEST_METHOD"]; //POST, GET, DELETE, PUT
$_SERVER["SERVER_NAME"];// nombre del servidor. ej: www.ejemplo.com
$_SERVER["HTTP_USER_AGENT"];//muestra el navegador que se está utilizando
echo $_SERVER["SERVER_PORT"];//muestra el nombre del servidor

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?= $_SERVER["PHP_SELF"];?>" method="post"></form>
<table>
    <tr>
        <td>Email:</td>
        <td><input type="email" name="email"></td>
    </tr>
    <tr>
        <td>Password:</td>
        <td><input type="password" name="password"></td>
    </tr>
</table>

<?php
include_once "./partes/pie.php";
?>
</body>
</html>