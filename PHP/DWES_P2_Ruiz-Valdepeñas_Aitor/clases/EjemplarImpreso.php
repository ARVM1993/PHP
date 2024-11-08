<?php

abstract class EjemplarImpreso {

    private string $isbn;
    private string $titulo;
    private int $numeroPaginas;

    public function __construct(string $isbn, string $titulo, int $numeroPaginas) {
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->numeroPaginas = $numeroPaginas;


        
    }

    public function getIsbn()   {
        return $this->isbn;
    }

   
    public function setIsbn($isbn){
        $this->isbn = $isbn;

        return $this;
    }

    public function getTitulo(){
        return $this->titulo;
    }

  
    public function setTitulo($titulo){
        $this->titulo = $titulo;

        return $this;
    }

    public function getNumeroPaginas() {
        return $this->numeroPaginas;
    }

   
    public function setNumeroPaginas($numeroPaginas) {
        $this->numeroPaginas = $numeroPaginas;

    }

    abstract function prestar();
    public abstract function showInfo();


}


?>