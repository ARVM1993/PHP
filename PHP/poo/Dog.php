<?php
include_once "Animal.php";

class Dog extends Animal {
    private string $race;

    public function __construct(array $parametros = []){
    parent::__construct();
    $this->setAge($parametros["age"] ?? 5);
    $this->race = $parametros["raza"] ?? "chucho";
    }

    public function getRace(): string{
        return $this->race;

    }
    public function setRace(string $race): void{
        $this->race = $race;
    }

public function showInfo(){
    echo "El perro tiene " . $this->getAge() . " años y su raza es " .
    $this->race;

}
public function talk(){
    echo "El perro hace guau guau";

}

}

$perro1 = new Dog();
$perro1->showInfo();
echo "<br>";
$perro1 ->talk();

