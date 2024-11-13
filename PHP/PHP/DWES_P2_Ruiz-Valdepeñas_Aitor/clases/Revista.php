<?php
require_once "EjemplarImpreso.php";

class Revista extends EjemplarImpreso{

    private int $cantidadRevistasPrestadas;

    public function __construct(string $isbn, string $titulo, int $numeroPaginas, int $cantidadRevistasPrestadas=0) {
        parent::__construct($isbn,$titulo, $numeroPaginas);
     
        $this->cantidadRevistasPrestadas = $cantidadRevistasPrestadas;
    }


    public function getCantidadRevistasPrestadas(): int {
        return $this->cantidadRevistasPrestadas;
    }

    public function setCantidadRevistasPrestadas(int $cantidadRevistasPrestadas): void {
        $this->cantidadRevistasPrestadas = $cantidadRevistasPrestadas;
    }

    public function prestar(){
        $this->cantidadRevistasPrestadas++;
        return "El numero de revistas prestadas es de: $this->cantidadRevistasPrestadas";
    }

    public function __toString() {
        return "Revista: " . $this->getTitulo() . " - ISBN: " . $this->getIsbn() . " - Páginas: " . $this->getNumeroPaginas() . " - Revistas Prestadas: " . $this->getCantidadRevistasPrestadas();
    }


    public function showInfo(){
        echo "<ul>";
        echo "<li>ISBN: " . $this->getIsbn() . "</li>";
        echo "<li>Título: " . $this->getTitulo() . "</li>";
        echo "<li>Número de Páginas: " . $this->getNumeroPaginas() . "</li>";
        echo "<li>Número de Revistas Prestadas: " . $this->getCantidadRevistasPrestadas() . "</li>";
        echo "</ul>";    
    }

}


?>