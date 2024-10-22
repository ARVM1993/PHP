<?php

class Circunferencia {

    private float $radio;

    public function __construct(float $radio){
        $this->radio = $radio;
    }

    public function getRadio(){
        return $this->radio;
    }

    public function setRadio(float $radio){
        $this->radio = $radio;
    }

    public function calcularPerimetro(): float {
        return 2 * 3.14 * $this->radio;
    }

    public function calcularArea(): float{
        return 3.14 * pow($this->radio, 2);
    }

    public function info(): string {
        return "Esta circunferencia tiene un radio de " . $this->radio . " cm\n" . 
               "Un perímetro de " . $this->calcularPerimetro() . " cm y un área de " . 
               $this->calcularArea() . " cm²\n";
    }
}

$circunferencia1 = new Circunferencia(30);
echo $circunferencia1->info();
echo "<br>";
echo "Perímetro: " . $circunferencia1->calcularPerimetro() . "\n";
echo "<br>";
echo "Área: " . $circunferencia1->calcularArea() . "\n";
echo "<br>";

$circunferencia2 = new Circunferencia(20);
echo $circunferencia2->info();
echo "<br>";
echo "Perímetro: " . $circunferencia2->calcularPerimetro() . "\n";
echo "<br>";
echo "Área: " . $circunferencia2->calcularArea() . "\n";
echo "<br>";

$circunferencia3 = new Circunferencia(10);
echo $circunferencia3->info();
echo "<br>";
echo "Perímetro: " . $circunferencia3->calcularPerimetro() . "\n";
echo "<br>";
echo "Área: " . $circunferencia3->calcularArea() . "\n";
echo "<br>";

?>
