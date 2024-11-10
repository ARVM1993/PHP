<?php

require_once "./Ejemplar.php";

class Revista extends Ejemplar{

    private int $cantidadRevistas;

    public function __construct(string $isbn, string $titulo, int $numeroPaginas, int $cantidadRevistas=0){
        parent::__construct($isbn, $titulo, $numeroPaginas);

        $this->cantidadRevistas=$cantidadRevistas;
    }

    public function getCantidadRevistas(){
        return $this->cantidadRevistas;
    }

    public function setCantidadRevistas(int $cantidadRevistas){
        return $this->cantidadRevistas= $cantidadRevistas;
    }

    public function __toString(){
        return "La revista es " . $this->getTitulo() . " con un ISBN de " . $this->getIsbn() . " tiene " . $this->getNumeroPaginas() . " paginas 
        y hay un total de " . $this->cantidadRevistas . " revistas"; 
        
    }

    public function presta(){
        return $this->cantidadRevistas;

    }


}