<?php

/*class Plato {
    private string $nombre;
    private float $precio;

    public function __construct(string $nombre, float $precio){
        $this->nombre=$nombre;
        $this->precio=$precio;
    }
}
    */

abstract class Plato{
    public function __construct(private string $nombre, 
    private float $precio)
    {}
    

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getPrecio(){
        return $this->precio;
    }
    public function setPrecio($precio) {
        $this->precio = $precio;

    }

    abstract function __toString();
    }
