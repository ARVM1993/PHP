<?php
require_once "./EjemplarImpreso.php";

class Libro extends EjemplarImpreso{

    private string $autoria;
    private int $numeroEjemplaresDisponibles;

    public function __construct(string $isbn, string $titulo, int $numeroPaginas,
    string $autoria, int $numeroEjemplaresDisponibles=1){
        parent::__construct($isbn, $titulo, $numeroPaginas);

        $this->autoria = $autoria;
        $this->numeroEjemplaresDisponibles = $numeroEjemplaresDisponibles;
    }
  
   
    public function getAutoria(){
        return $this->autoria;
    }

  
    public function setAutoria($autoria){
        $this->autoria = $autoria;

        return $this;
    }

  
    public function getNumeroEjemplaresDisponibles(){
        return $this->numeroEjemplaresDisponibles;
    }


    public function setNumeroEjemplaresDisponibles($numeroEjemplaresDisponibles){
        $this->numeroEjemplaresDisponibles = $numeroEjemplaresDisponibles;
    }

    public function prestar(){
        if($this->numeroEjemplaresDisponibles > 0){
            $this->numeroEjemplaresDisponibles--;
            return "El numero de ejemplares disponible es de: $this->numeroEjemplaresDisponibles";
            }else{
                return "No hay ejemplares";
            }   
    }
    public function showInfo(){
        echo "<ul>";
        echo "<li>ISBN: " . $this->getIsbn() . "</li>";
        echo "<li>Título: " . $this->getTitulo() . "</li>";
        echo "<li>Número de Páginas: " . $this->getNumeroPaginas() . "</li>";
        echo "<li>Autoría: " . $this->getAutoria() . "</li>";
        echo "<li>Número de Ejemplares Disponibles: " . $this->getNumeroEjemplaresDisponibles() . "</li>";
        echo "</ul>";    }

        public function __toString() {
            return "Libro: " . $this->getTitulo() . " de " . $this->getAutoria() . " - ISBN: " . $this->getIsbn() . " - Páginas: " . $this->getNumeroPaginas();
        }


}
$libro1 = new Libro("978-3-16-148410-0", "El Gran Libro", 200, "Juan Pérez", 5);
echo $libro1; 

echo $libro1->showInfo();

echo $libro1->prestar();  


?>