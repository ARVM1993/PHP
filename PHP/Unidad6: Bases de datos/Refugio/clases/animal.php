<?php

class Animal {
    private string $id;
    private int $peso;

    public function __construct(string $id, int $peso){
        $this->id = $id;
        $this->peso = $peso;
    }

    public function getPeso(){
        return $this->peso;
    }

    public function getId(){
        return $this->id;  
    }
}