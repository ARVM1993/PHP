<?php

class Persona {

    //Atributos
    private string $nombre;
    private int $edad;
    private bool $carnetConducir;

    // Constructor
   
    

    //Getters y setters: no es necesario crearlos todos, solo los que se vayan a utilizar

    public function getNombre(): string {
        return $this->nombre;
    }
    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }
    public function getEdad(): int {
        return $this->edad;
    }
    public function setEdad(int $edad): void {
        $this->edad = $edad;
    }
    public function getCarnetConducir(): bool {
        return $this->carnetConducir;
    }
    public function setCarnetConducir(bool $carnetConducir): void {
        $this->carnetConducir = $carnetConducir;
    }

    //Metodos

    public function esMayorEdad (): bool {
        return $this->edad >= 18;
    }

    public function aprenderAConducir(int $tiempo): bool {
        if ($this->carnetConducir) {
            echo "Ya sabía conducir.";
            return false;
        }
        echo "He aprendido a conducir en $tiempo meses.";
        $this->carnetConducir = true;
        return true;
    }

}

$p = new Persona(); // Using the default constructor
$p->setNombre("Juan");
$p->setEdad(25);
$p->setCarnetConducir(true);

// Printing the attributes
echo $p->getNombre() . " -- Edad: " . $p->getEdad();

?>
