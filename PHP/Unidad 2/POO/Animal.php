<?php

class Animal {

    private $alimentacion;
    private $patas;

    public function __construct (string $alimentacion, int $patas = 4){
        $this->alimentacion = $alimentacion;
        $this->patas = $patas;
    }

    public function __toString(): string {
        return "Alimentación: " . $this->alimentacion . ", Patas: " . $this->patas;
    }
}

class Leon extends Animal {
    private $melena;

    public function __construct (string $alimentacion, int $patas, bool $melena){
        parent::__construct($alimentacion, $patas);
        $this->melena = $melena;
    }

    public function __toString(): string{
        $ret = parent::__toString();
        if ($this->melena) {
            $ret .=". si";
        } else {
            $ret .= ". No";
        }
        $ret .= " tiene melena";
        return $ret;
    }
    
    public function rugir(){
        $ruge = "roar";
        echo "El león hace " . $ruge;
    }
}

class Perro extends Animal {
    public function __construct (string $alimentacion, int $patas){
        parent::__construct($alimentacion, $patas);
    }

    public function __toString(): string{
        return "Perro " . parent::__toString();
    }

    public function ladrar(){
        $ladrar = "Woof";
        echo "El perro hace " . $ladrar;
    }

}

$perro1 = new Perro ("carnivoro", 4);
echo $perro1->ladrar();
echo "<br>";
echo  $perro1;

echo "<br>";
$leon1 =new  Leon ("carnivoro", 4, true);
echo $leon1->rugir();
echo "<br>";
echo  $leon1;