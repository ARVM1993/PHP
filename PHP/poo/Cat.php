<?php
include_once "Animal.php";
 class Cat extends Animal{
    private string $color;
/*
Asi podemos pasarle valores por defecto:
    public function __construct(array $params =[]){
        parent::__construct();
        $this->color=$params["color"] ?? "marron";
        $this->setAge($params["age"]?? 4);
    }
No haria falta pasar valores en la instancia 
 

*/
    public function __construct(int $age, string $color ="marron"){
        parent::__construct($age);
        $this->color=$color;
    }

    public function getColor (): string{
        return $this->color;
    } 
    public function setColor(string $color):void{
        $this->color=$color;
    }

    function talk(){
        echo "El gato hace miau, miau";
    }
    function showInfo()
    {
        echo "El gato es de color " . $this->color . " y tiene " . 
        $this->getAge() . " años";
    }

}

$cat = new Cat(4);
$cat->showInfo();
echo "<br>";
$cat->talk();

//$cat2 = new Cat(['color' => 'negro']); // Crea un gato con edad 4 y color "negro"

//$cat3 = new Cat(['age' => 5, 'color' => 'blanco']); // Crea un gato con edad 5 y color "blanco"
