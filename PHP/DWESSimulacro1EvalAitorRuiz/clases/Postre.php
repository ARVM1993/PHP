<?php
include_once "./Plato.php";
class Postre extends Plato{
    private int $cantidadAzucar;

    public function __construct(string $nombre, string $descripcion, float $precio, int $cantidadAzucar
    ){
        parent::__construct($nombre, $descripcion, $precio);
        $this->cantidadAzucar =$cantidadAzucar;
    }

    public function getCantidadAzucar(){
        return $this->cantidadAzucar;
    }

    public function setCantidadAzucar($cantidadAzucar){
        $this->cantidadAzucar=$cantidadAzucar;
    }

    function __toString(){
        return "Nombre: ".$this->nombre." Descripcion: ".$this->descripcion." Precio
        : ".$this->precio." Cantidad Azucar: ".$this->cantidadAzucar;
        
        }
}