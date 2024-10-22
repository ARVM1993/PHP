<?php
class Punto {

    /*

    private int $coordX;
    private int $coordY;

    public function __construct(int $coordX, int $coordY){
        $this->coordX = $coordX;
        $this->coordY = $coordY;
    }

    Una alternativa para ahorrar codigo es:*/

    public function __construct(private int $coordX, private int $coordY){

    }



    public function __toString() {
        // Use proper string concatenation with the dot (.)
        return $this->coordX . ", " . $this->coordY;
    }
}
?>