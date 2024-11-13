<?php

class Empleade{
    private string $nombre;
    private string $apellidos;
    private float $sueldo;
    private array $telefonos;

    function __construct(string $nombre, string $apellidos, float $sueldo = -1, array $telefonos=[]){
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->sueldo=$sueldo;
        $this->telefonos=$telefonos;
    }
        public function getNombre(){
            return $this->nombre;

        }
        public function setNombre(string $nombre){
            $this->nombre=$nombre;
        }

        public function getApellidos(){
            return $this->apellidos;
        }
        public function setApellidos(string $apellidos){
            $this->apellidos=$apellidos;
        }
        public function getSueldo(){
            return $this->sueldo;
        }
        public function setSueldo(float $sueldo){
            $this->sueldo=$sueldo;
        }

        public function getTelefono(){
            return $this->telefonos;
        }
        public function setTelefono(array $telefonos=[]){
            $this->telefonos=$telefonos;
        }

        public function __toString(){
            return "El/la empleade se llama " . $this->nombre . " " . $this->apellidos . 
            " y su sueldo es de " . $this->sueldo . "y sus telefonos " . $this->telefonos["numero"];
        }
        
        public function getNombreCompleto(){
            return $this->nombre . " " . $this->apellidos;

        }

        public function pagarImpuestos(): float {
            if ($this->sueldo == -1) {
                return -1; 
            }
            if ($this->sueldo < 12450) {
                $irpf = $this->sueldo * (19 / 100);
            } elseif ($this->sueldo < 20199) {
                $irpf = $this->sueldo * (24 / 100);
            } elseif ($this->sueldo < 35199) {
                $irpf = $this->sueldo * (30 / 100);
            } elseif ($this->sueldo < 59999) {
                $irpf = $this->sueldo * (37 / 100);
            } elseif ($this->sueldo < 299999) {
                $irpf = $this->sueldo * (45 / 100);
            } else {
                $irpf = $this->sueldo * (47 / 100);
            }
            
    
            $sueldoNeto = $this->sueldo - $irpf; 
            return $sueldoNeto; 
        }

        public function añadirTelefono(int $telefono){
            $this->telefonos[]= $telefono;
        }
        public function listarTelefono() {
        
            $listado = [];
            foreach ($this->telefonos as $key) {
                $listado[] = implode(", ", $key);
            }
            
            $listadoFinal = implode("|", $listado);

            return $listadoFinal;
            }
        

        public function vaciarTelefonos(){
            array_splice($this->telefonos, 0);

        }

        public function toHtml():string{
            $html = "<p>Nombre: " . $this->nombre . " Apellidos: " . $this->apellidos . 
            " Sueldo: " . $this->sueldo . " y paga " . $this->pagarImpuestos() . " euros</p>";
            if (!empty($this->telefonos)) {
                $html .= "<ul>";
                foreach ($this->telefonos as $telefono) {
                $html .= "<li>$telefono</li>";
                }
                $html .= "</ul>";
            }
            return $html;

        }
    }
    ?>
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 20px;
            padding: 20px;
            border-radius: 8px;
            background: #fff;
        }
        h1 {
            color: #2c3e50;
        }
        p {
            margin: 10px 0;
        }
        ul {
            list-style-type: none;
            padding-left: 0;
        }
        li {
            background: #ecf0f1;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<h1>Listado de Empleados</h1>