<?php
include_once "./Plato.php";

class Principal extends Plato{

    private bool $tieneGluten;
    
    public function __construct(string $nombre, string $descripcion, float $precio, bool $tieneGluten
    ){
        parent::__construct($nombre, $descripcion, $precio);
        $this->tieneGluten =$tieneGluten;
    }

    public function getTieneGluten(): string {
        return $this->tieneGluten ? "Sí" : "No";
    }
    

    public function setTieneGluten($tieneGluten){
        $this->tieneGluten=$tieneGluten;

    }

    public function __toString(): string{
        return "Nombre: " . $this->getNombre() . "\n" .
        "Descripción: " . $this->getDescripcion() . "\n" .
        "Precio: " . $this->getPrecio() . "\n" .
        "Tiene Gluten: " . $this->getTieneGluten();
        }


}