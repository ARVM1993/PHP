<?php

include_once "./Bibiloteca.php";
include_once "./interfaz.php";

class Libros extends Biblioteca implements Prueba{
    public function __construct(
        private string $autoria,
        private int $numeroEjemplares,
        string $isbn, 
        string $titulo, 
        int $numeroPaginas)
        {
            parent::__construct($isbn, $titulo, $numeroPaginas);
        }

        public function getAutoria(){
                return $this->autoria;
        }

        public function setAutoria($autoria){
                $this->autoria = $autoria;
        }
            
        public function getNumeroEjemplares()  {
                return $this->numeroEjemplares;
        }
        public function setNumeroEjemplares($numeroEjemplares)  {
                $this->numeroEjemplares = $numeroEjemplares;
        }

        public function __toString(){
            return "<table border=1>
            <tr>

            <th>Libro</th>
            <td>{$this->getTitulo()}</td>
            </tr>
             <tr>
              <th>Autor</th>
              <td>{$this->autoria}</td>
            </tr>
             <tr>
              <th>Ejemplares</th>
            <td>{$this->numeroEjemplares}</td>
            </tr>
             <tr>
                 <th>ISBN</th>
            <td>{$this->getIsbn()}</td>
            </tr>
             <tr>
                 <th>Numero de paginas</th>
            <td>{$this->getNumeroPaginas()}</td>
            </tr>
            </table>";
            
            
        }
    public function hola(){

    
        echo "Adios";
    }
    public function adios(){

    }
    public function pinchar($rueda): ?Libros {
        if ($rueda->getInflada()) {
        $rueda->setInflada(false);
        return $rueda;
        }
        return null;
        }
        }

$libro = new Libros("Aitor", 5,"234343f", "Mi vida", 200);

echo $libro->__toString();
