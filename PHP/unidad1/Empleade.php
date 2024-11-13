<?php

class Empleade{
    public function __construct(
        private string $name,
        private string $surname,
        private int $salary = -1,
        private array $telephoneNumbers= []
    )
    {}

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name=$name;
    }
    public function getSurname(){
        return $this->surname;
    }
    public function setSurname($surname){
        $this->surname=$surname;

    }
    public function getSalary(){
        return $this->salary;
    }

    public function setSalary($salary){
        $this->salary=$salary;
    }

    public function getTelephoneNumbers(){
        return $this->telephoneNumbers;
    }
    public function setTelephoneNumbers($telephoneNumbers){
        $this->telephoneNumbers=$telephoneNumbers;
    }

    public function __toString(){
        $outPut= "<table border=1>
        <tr>
        <th>Nombre</th>
        <td>{$this->name}</td>
        </tr>
         <tr>
        <th>Apellido</th>
        <td>{$this->surname}</td>
        </tr>
         <tr>
        <th>Salario</th>
        <td>{$this->salary}</td>
        </tr>
        <tr>
        <th>Numeros de telefono</th>
        <td>";
        foreach ($this->telephoneNumbers as $numbers) {
            $outPut.= "{$numbers}<br>";
        }
        $outPut .= "</td></tr> </table>";
    return $outPut;
    
    }
   
    public function getNombreCompleto(){
        return "Mi nombre es {$this->name}{$this->surname}";
    }

    public function pagarImpuestos(){
        if ($this->salary == -1) {
            return -1;
        }elseif ($this->salary >= 0 && $this->salary <= 12450) {
            return $this->salary * 0.19;
        }elseif ($this->salary >= 12450 && $this->salary <=20199) {
            return $this->salary * 0.24;
        }elseif($this->salary >=20200 && $this->salary <=35199){
            return $this->salary * 0.3;
        } elseif ($this->salary >=35200 && $this->salary <= 59999) {
            return $this->salary  * 0.37;
        }elseif($this->salary >= 60000 && $this->salary <= 299999){
            return $this->salary * 0.45;
        }else {
            return $this->salary * 0.47;
        }

    }

    public function addTelephoneNumbers(string $numeroTelefono){
        $this->telephoneNumbers[] = $numeroTelefono;
    }

    public function listTelephoneNumbers(){
            $listado= implode("|", $this->telephoneNumbers);
            return $listado;
        }
    public function voidTelephone(){
        array_splice($this->telephoneNumbers, 0);

    }

    }
