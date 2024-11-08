
<?php

require_once "./Libro.php";

class Biblioteca {
    private array $libros[];

    public function __construct(array $libros){

        $this.$libros -> libros;
    }


    public function getLibros() {
        return $this->libros;
    }


    public function setLibros($libros) {
        $this->libros = $libros;

        return $this;
    }

    public function agregarLibro(&$libros, $libro){
        $libros[] = $libro;
    }

    public function buscarLibrosPorISBN($libros, $isbn){
        foreach ($libros as $libro) {
            if ($libro->getISBN() == $isbn) {
                return $libro;
            }
        }
                return null;
    }
        
}


?>