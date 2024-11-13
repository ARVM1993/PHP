<?php

abstract class Plato{
    public function __construct(
        private string $nombre,
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
    public function setPrecio($precio){
        $this->precio = $precio;
    }

    abstract function __toString();

}

