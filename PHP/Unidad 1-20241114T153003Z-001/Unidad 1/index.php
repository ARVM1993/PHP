<?php

class Coche {

    public $marca;
    public $modelo;
    private $velocidad;

    public function __construct($marca,$modelo){
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = 0;

    }

    public function acelerar ($incremento){
        $this->velocidad += $incremento;
    }

    public function frenar ($decremento){
        $this->velocidad -=$decremento;
        if($this->velocidad < 0) {
            $this->velocidad = 0;
        }
        print __METHOD__ . "\n"; 

        echo "el coche ha reducido su velocidad a " . $this->velocidad;

    }
}

?>