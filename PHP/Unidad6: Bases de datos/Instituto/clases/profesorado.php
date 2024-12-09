<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/Instituto/clases/persona.php";



class Profesorado extends Persona {
    private string $departamento;
    private bool $interino;

    public function __construct(string $id, string $nombre, string $departamento, bool $interino) {
        parent::__construct($id, $nombre);
        $this->departamento = $departamento;
        $this->interino = $interino;
    }

    public function getDepartamento(){
        return $this->departamento;
    }

    public function getInterino(){
        return $this->interino;
    }
}

