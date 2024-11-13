<?php

 abstract class Biblioteca{
    public function __construct(
        private string $isbn,
        private string $titulo,
        private int $numeroPaginas
    )
    {}

    public function getIsbn(){
        return $this->isbn;
    }
    public function setIsbn($isbn){
         $this->isbn=$isbn;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titulo){
         $this->titulo = $titulo;
    }

    public function getNumeroPaginas(){
        return $this->numeroPaginas;
    }

    public function setNumeroPaginas($numeroPaginas){
         $this->numeroPaginas= $numeroPaginas;
    }

    public function __toString(){
        return "ISBN: $this->isbn, Titulo: $this->titulo, Paginas: $this->numeroPaginas";
    }

    abstract function hola();
}