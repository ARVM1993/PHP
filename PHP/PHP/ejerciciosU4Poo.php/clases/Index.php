<?php
include_once "Empleade.php";

$empleade1 = new Empleade("Aitor", "Ruiz", 200000, [123456789, 987654321]);
echo $empleade1; 
echo "<br>";
echo "Nombre completo: " . $empleade1->getNombreCompleto();
echo "<br>";
$sueldoNetoEmpleade1 = $empleade1->pagarImpuestos();
echo "Sueldo neto después de pagar impuestos: $sueldoNetoEmpleade1";
echo "<br>";
echo $empleade1->toHtml();
echo "<br>";

$empleade2 = new Empleade("Lucia", "Isabel", 120000, [123456789, 987654321]);
echo $empleade2;
echo "<br>";
echo "Nombre completo: " . $empleade2->getNombreCompleto();
echo "<br>";
$sueldoNetoEmpleade2 = $empleade2->pagarImpuestos();
echo "Sueldo neto después de pagar impuestos: $sueldoNetoEmpleade2";
echo "<br>";
echo "Numero de telefono: " .$empleade1->añadirTelefono(9172633);
echo $empleade2->toHtml();
echo "<br>";

$empleade3 = new Empleade("Cristian", "Panyagua", -1);
echo $empleade3;
echo "<br>";
echo "Nombre completo: " . $empleade3->getNombreCompleto();
echo "<br>";
$sueldoNetoEmpleade3 = $empleade3->pagarImpuestos();
echo "Sueldo neto después de pagar impuestos: $sueldoNetoEmpleade3";
echo "<br>";
echo $empleade3->toHtml();