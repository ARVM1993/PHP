<?php

include_once "./Plato.php";
class Postre extends Plato{
    public function __construct(
        string $nombre, 
        float $precio,
        private float $cantidadAzucar 
        ){
            parent::__construct(
                $nombre,
                $precio
            );
        {}
    }

    public function getCantidadAzucar(){
        return $this->cantidadAzucar;
    }

    public function setCantidadAzucar($cantidadAzucar){
        $this->cantidadAzucar=$cantidadAzucar;
    }

    public function __toString(){
        return "Nombre: {$this->getNombre()}, Precio: {$this->getPrecio()}, Cantidad
        de azúcar: $this->cantidadAzucar";
    }
}