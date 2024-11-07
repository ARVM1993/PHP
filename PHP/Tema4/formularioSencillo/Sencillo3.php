<?php

//Una vez verificado el fomrularios iniciar una sesion usamos y vamos a index:

session_start(); //acostumbrarse hacerlo al inicio de cada archivo
require "./funciones.php";

//Aqui puedo controlar desde donde ha llegado el cliente que me visita
if (!isset($_SESSION['origin']) && $_SESSION["origin"]!= "Sencillo3.php") {
    echo "NOOOO";
    header("Location: ./Sencillo.php");
}else {
    echo "SII";
}
    header("Location: index.php");




$comentario =$publico ="";
$comentarioErr = $comentarioCortoErr = "";
$errores = false;
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    //Compruebo si he llegado a traves del boton submit
    //Recoger valores del formulario
    $comentario = securizar($_POST["comment"]);
    if (empty($comentario)) {
        $comentarioErr = "El comentario es obligatorio";
        $comentarioErr = true;
    } elseif (strlen($comentario) < 5) {
        $comentarioCortoErr="El comentario es menor a 5 caracteres";
        $comentarioCortoErr=true;
    }

    if (isset($_POST["public"])) {
        $publico = true;
    }
    if (!$errores) {
        $_SESSION["comment"] = $comentario;
        $_SESSION["public"] = $publico;
        $_SESSION["origin"] = "Sencillo3";

        //Redirijo a otra pagina (indexComentarios.) 
        header("Location: ./indexComentarios.php");
        //Termino la ejecucion de este script
        exit();
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

<?php
var_dump($_POST);
?>
    <form method="POST" action="<?php echo securizar($_SERVER['PHP_SELF']); ?>">
        <label>Comentario: *</label>
        <br>
        <input 
            type="text" 
            name="comment" 
            placeholder="Introduce comentario..." 
            value ="<?php if (!empty($comentarioCortoErr)) echo $comentario ?>">
        
            <label class="error"><?php echo $comentarioErr ?></label>
        <label class="error"><?php echo $comentarioCortoErr ?></label>
        <br>
        <label>Quiero que sea publico</label>
        <input type="checkbox" name="public" <?php if ($publico) echo "checked";?>>
        <input type="submit" value="Enviar" >


    </form>
</body>
</html>