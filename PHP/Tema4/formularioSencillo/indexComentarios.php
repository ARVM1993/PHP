<?php
session_start();
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

    var_dump($_SESSION);
echo "<p>Tu comentario: " . $_SESSION["comment"] . "</p>";
if ($_SESSION["public"]) {
    echo "<p>Si";
}else {
       echo "<p>NO";

    }
echo " quieres que sea publico</p>";

    ?>
</body>
</html>