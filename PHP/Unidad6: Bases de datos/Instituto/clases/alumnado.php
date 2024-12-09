<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/Instituto/clases/persona.php";

class Alumnado extends Persona {
    private int $edad;
    private bool $matriculado;

    public function __construct(string $id, string $nombre, int $edad, bool $matriculado){
        parent::__construct($id, $nombre);
        $this->edad = $edad;
        $this->matriculado = $matriculado;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function getMatriculado(){
        return $this->matriculado;
    }
}

