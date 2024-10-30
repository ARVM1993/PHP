<?php

include_once "Person.php";

class Employee extends Person{

    public function __construct($name, $surname, $salary, $telephones = []){
        parent::__construct($name, $surname, $salary, $telephones);

    } 
        function getFullName(): string{
            return "El nombre es " . $this->getName() . " " . $this->getSurname();

        }
        function payTaxes(): float{
            if ($this->getSalary() == -1) {
                return -1; 
            }
            if ($this->getSalary() < 12450) {
                $irpf = $this->getSalary() * (19 / 100);
            } elseif ($this->getSalary() < 20199) {
                $irpf = $this->getSalary() * (24 / 100);
            } elseif ($this->getSalary() < 35199) {
                $irpf = $this->getSalary() * (30 / 100);
            } elseif ($this->getSalary() < 59999) {
                $irpf = $this->getSalary() * (37 / 100);
            } elseif ($this->getSalary() < 299999) {
                $irpf = $this->getSalary() * (45 / 100);
            } else {
                $irpf = $this->getSalary() * (47 / 100);
            }
    
            return $$irpf; 
    

        }
         function addTelephone(int $telephone): void{
            /*cuando el tipo es un primitivo puedes trabajar directamente con 
            con el, pero cuando es de un tipo mas complejo como un array
            tienes que hacerlo por medio de una variable*/
        $telephones = $this->getTelephones();
        $telephones[] = $telephone; 
        $this->setTelephones($telephones);
      

        }
        function listTelephones(): string{
            $listTelephone = $this->getTelephones();
            $telephoneStrings = [];
            foreach ($listTelephone as $telephone) {
                $telephoneStrings[] = $telephone;
            }
            return implode(", " , $telephoneStrings);

        }


        function emptyTelephones(): void{

            $this->setTelephones([]);

        }
        function toHtml(): string{
            $fullName = $this->getFullName();
            $salary = $this->getSalary();
            $taxes = $this->payTaxes(); 
    
            $html = "<p>Nombre: $fullName</p>";
            $html .= "<p>Sueldo: $salary</p>";
            $html .= "<p>Impuestos: $taxes</p>";
    
            $telephones = $this->getTelephones();
            if (!empty($telephones)) {
                $html .= "<ul>";
                foreach ($telephones as $telephone) {
                    $html .= "<li>$telephone</li>";
                }
                $html .= "</ul>";
            }
    
            return $html; 
        }
        function calculateSalary():float {
            if ($this->getSalary() == -1) {
                return -1; 
            }
            if ($this->getSalary() < 12450) {
                $irpf = $this->getSalary() * (19 / 100);
            } elseif ($this->getSalary() < 20199) {
                $irpf = $this->getSalary() * (24 / 100);
            } elseif ($this->getSalary() < 35199) {
                $irpf = $this->getSalary() * (30 / 100);
            } elseif ($this->getSalary() < 59999) {
                $irpf = $this->getSalary() * (37 / 100);
            } elseif ($this->getSalary() < 299999) {
                $irpf = $this->getSalary() * (45 / 100);
            } else {
                $irpf = $this->getSalary() * (47 / 100);
            }
    
            $sueldoNeto = $this->getSalary() - $irpf; 
            return $sueldoNeto; 
        }

        }
    
    
