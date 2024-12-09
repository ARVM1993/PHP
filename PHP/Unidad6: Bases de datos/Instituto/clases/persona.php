<?php

class Persona {
    private string $id;
    private string $nombre;

    public function __construct(string $id, string $nombre){
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }
}