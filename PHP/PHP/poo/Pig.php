<?php

include_once "Animal.php";

class Pig extends Animal{

    private string $diet;

    public function __construct(array $paramet =[]){
        parent::__construct();
        $this->setAge($paramet["age"] ?? 5);
        $this->diet =$paramet["diet"] ?? "trufas";
    }

    public function getDiet(): string{
        return $this->diet;

    }

    public function setDiet(string $diet):void{
        $this->diet = $diet;
    }



    public function showInfo(){
        echo "El cerdo tiene " . $this->getAge() . " años 
        y come " . $this->diet;

    }
    public function talk(){
        echo "El cerdo hace oink oink";
}
}

$pig1 = new Pig();
$pig1->showInfo();
echo "<br>";
$pig1->talk();
echo "<br>";
echo "<br>";
$pig2 = new Pig(["age"=> 8, "diet"=> "fruta"]);
$pig2->showInfo();
echo "<br>";
$pig2->talk();