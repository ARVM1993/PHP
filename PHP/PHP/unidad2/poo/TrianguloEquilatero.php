<?php

include_once 'Poligono.php';
class TrianguloEquilatero extends Poligono {

    private float $lado;
    private float $altura;

    public function __construct(float $lado, 
    float $altura, string $color = "sin color") {


        /*en el constructor ponemos los elementos que queremos que se reconozca en el objeto dejamos lo valores por defecto los ultimo y separamos
        los valores  que se pueden repetir de los que no se pueden repetir. Ej:

        parent::__construct(3, $color); con esto se dara valor 3 al$numero lados y el color sera null
        $this->lado = $lado;
        $this->altura = $altura;
        
        
        */
        parent::__construct(3, $color);
        $this->lado = $lado;
        $this->altura = $altura;
        }

        public function __toString():string{
            return parent::__toString()  . " lado: {$this->lado}  altura: {$this->altura}";
        }

    

    public function calcularArea():float{
        return ($this->lado * $this->altura)/2;

    }
    public function calcularPerimetro(): float{
        return ($this->lado*3);
    }

}