<?php
include_once "Poligono.php";

class Cuadrado extends Poligono {
    private float $lado;

    public function __construct(float $lado, string $color){
        parent::__construct(4, $color);
        $this->lado = $lado;
    }

    public function calcularArea(): float {
        return $this->lado ** 2;
    }

    public function calcularPerimetro(): float {
        return $this->lado * 4;
    }

    public function __toString(): string {
        return parent::__toString() . " y lado de longitud $this->lado";
    }
}