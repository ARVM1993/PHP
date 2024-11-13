<?php

function securizar ($datos): string{
$datos=trim($datos);
$datos=stripslashes($datos);
$datos=htmlspecialchars($datos);
return $datos;

}
?>