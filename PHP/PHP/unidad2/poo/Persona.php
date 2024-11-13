<?php

class Persona {

    // Atributos
    private string $nombre;
    private int $edad;
    private bool $carnetConducir;

    // Constructor
    public function __construct(string $nombre, int $edad, bool $carnetConducir) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->carnetConducir = $carnetConducir;
    }

    // Getters y setters
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

    // Métodos
    public function esMayorEdad(): bool {
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

    // Método info
    public function info(): string {
        $carnet = $this->carnetConducir ? "tiene carnet de conducir" : "no tiene carnet de conducir";
        return $this->nombre . " tiene " . $this->edad . " años y " . $carnet . ".";
    }

}

// Crear una instancia de Persona
$p1 = new Persona("Alberto", 29, true); // Usando el constructor

// Llamar al método info para obtener la información del objeto
echo $p1->info();

// Imprimir los atributos
echo "\n" . $p1->getNombre() . " Edad: " . $p1->getEdad();

?>
