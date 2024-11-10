<?php

abstract class Ejemplar {
    private string $isbn;
    private string $titulo;
    private int $numeroPaginas;

    public function __construct(string $isbn, 
    string $titulo, int $numeroPaginas){

        $this->isbn=$isbn;
        $this->titulo= $titulo;
        $this->numeroPaginas=$numeroPaginas;


    }
        public function getIsbn(){
            return $this->isbn;
        }
       public  function setIsbn(string $isbn){ 
            $this->isbn=$isbn;
        }

       public function getTitulo(){
            return $this->titulo;
        }

       public function setTitulo(string $titulo) {
         $this->titulo=$titulo;

       }

       public function getNumeroPaginas(){
        return $this->numeroPaginas;
        }

        public function setNumeroPaginas(int $numeroPaginas){
            $this->numeroPaginas=$numeroPaginas;
        }

        abstract function presta();

}