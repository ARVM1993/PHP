<?php
abstract class Animal {
    private $age;

    public function __construct(int $age = 2){
        $this->age = $age;
    }

    public function getAge(): int{
        return $this->age;

    }
    public function setAge(int $age):void{ 
        $this->age = $age;

    }

    public abstract function talk();
    public abstract function showInfo();


}


