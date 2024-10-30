<?php
include_once "Animal.php";
include_once "Interface.php";
class Pollito extends Animal implements Correr{
    private string $descripcion;

    public function __construct(array $parameters =[]){
        parent::__construct();
        $this->setAge($parameters["age"] ?? 1);
        $this->descripcion = $parameters["descripcion"] ?? "es amarillo y pequeñin";    
    }

        public function getDescripcion(): string{
            return $this->descripcion;
        }

        public function setDescripcion(string $descripcion): void{
            $this->descripcion= $descripcion;

        }

    public function showInfo(){
        echo "El pollito tiene " . $this->getAge() . " años y es " .
        $this->descripcion;

    }
    public function talk(){
        echo "el pollito hace pio pio";
}
public function velocidad(){
    echo "corre mucho";
}

}

$pollito1 = new Pollito(["age"=> 1, "descripcion" => "es gordito"]);
$pollito1->showInfo();
$pollito1->talk();
$pollito1->velocidad();


echo "<br>";

$pollito2 = new Pollito();
$pollito2->showInfo();
$pollito2->talk();
$pollito2->velocidad();
