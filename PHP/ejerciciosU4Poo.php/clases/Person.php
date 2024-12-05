<?php

abstract class Person{
    private string $name;
    private string $surname;
    private float $salary;
    private array $telephones;

    public function __construct(string $name, string $surname, float $salary, array $telephones = []) {
        $this->name = $name;
        $this->surname = $surname;
        $this->salary = $salary;
        $this->telephones = $telephones;
        }
    
        public  function getName(): string{
            return $this->name;
        }
        public function setName(string $name){
            return $this->name;
        }
        public function getSurname(): string{
            return $this->surname;
        }
        public function setSurname(string $surname){
            $this->surname = $surname;
        }
        public function getSalary(): float{
            return $this->salary;
        }
        public function setSalary(float $salary){
            $this->salary = $salary;
        }
        public function getTelephones(): array{
            return $this->telephones;
        }
        public function setTelephones(array $telephones){
            $this->telephones = $telephones;
        }

        abstract function getFullName():string;
        abstract function payTaxes(): float;
        abstract function addTelephone(int $telephones): void;
        abstract function listTelephones():string;
        abstract function emptyTelephones(): void;
        abstract function toHtml(): string;
        abstract function calculateSalary(): float;
    
    }