<?php
include $_SERVER['DOCUMENT_ROOT'] . "/clases/animal.php";
class Oveja extends Animal {
    private string $especie;
    private bool $enferma;

    public function __construct(string $id, int $peso, string $especie, bool $enferma){
        parent::__construct($id, $peso);  // Llamada al constructor de la clase base
        $this->especie = $especie;
        $this->enferma = $enferma;
    }

    public function getEspecie(){
        return $this->especie;
    }

    public function getEnferma(){
        return $this->enferma;
    }
}

?>