<?php

require_once "./Ejemplar.php";

class Libro extends Ejemplar {
    private string $autoria;
    private int $numeroEjemplares;

    public function __construct(string $isbn, string $titulo, int $numeroPaginas, 
                                string $autoria, int $numeroEjemplares=1) {
        // Llamada al constructor de la clase padre
        parent::__construct($isbn, $titulo, $numeroPaginas);
        $this->autoria = $autoria;
        $this->numeroEjemplares = $numeroEjemplares;
    }
        public function getAutoria() {
            return $this->autoria;
        }
    
        public function setAutoria(string $autoria) {
            $this->autoria = $autoria;
        }
    
        public function getNumeroEjemplares() {
            return $this->numeroEjemplares; 
        }
    
        public function setNumeroEjemplares(int $numeroEjemplares) {
            $this->numeroEjemplares = $numeroEjemplares;
        }

    public function __toString(){
        return "El libro se titula" . $this->getTitulo() . " escrito por ". $this->autoria . " su ISBN es" . $this->getIsbn() . 
        "tiene" . $this-> getNumeroPaginas() . " y hay un numero de " . $this->numeroEjemplares . "ejemplares";
        
    }

    public function presta(){
        if ($this->numeroEjemplares>0) {
           return $this->numeroEjemplares--;

        }
    }

}