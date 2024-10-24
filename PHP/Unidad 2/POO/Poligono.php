<?php

//Vamos a probar los metodos abstractos, primero definimos abstracta la clase

abstract class Poligono {

    private int $numeroLados;
    private string $color;

    public function __construct($numeroLados, $color){
        $this->numeroLados = $numeroLados;
        $this->color = $color;
    }
    function __toString(): string{
        return "Poligono con $this->numeroLados lados y color $this->color";
    }

    public abstract function calcularArea(): float;
    public abstract function calcularPerimetro(): float;
    
}