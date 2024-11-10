<?php
require_once "EjemplarImpreso.php";

class Libro extends EjemplarImpreso {

    private string $autoria;
    private int $numeroEjemplaresDisponibles;

    public function __construct(string $isbn, string $titulo, int $numeroPaginas,
    string $autoria, int $numeroEjemplaresDisponibles=1) {
        parent::__construct($isbn, $titulo, $numeroPaginas);
        $this->autoria = $autoria;
        $this->numeroEjemplaresDisponibles = $numeroEjemplaresDisponibles;
    }

    public function getAutoria(): string {
        return $this->autoria;
    }

    public function setAutoria(string $autoria): void {
        $this->autoria = $autoria;
    }

    public function getNumeroEjemplaresDisponibles(): int {
        return $this->numeroEjemplaresDisponibles;
    }

    public function setNumeroEjemplaresDisponibles(int $numeroEjemplaresDisponibles): void {
        $this->numeroEjemplaresDisponibles = $numeroEjemplaresDisponibles;
    }

    // Método para prestar un libro
    public function prestar(): string {
        if ($this->numeroEjemplaresDisponibles > 0) {
            $this->numeroEjemplaresDisponibles--;
            return "Préstamo exitoso. Ejemplares restantes: " . $this->numeroEjemplaresDisponibles;
        } else {
            return "No hay ejemplares disponibles para prestar.";
        }
    }

    // Método para mostrar la información del libro
    public function showInfo(): string {
        $info = "<ul>";
        $info .= "<li>ISBN: " . $this->getIsbn() . "</li>";
        $info .= "<li>Título: " . $this->getTitulo() . "</li>";
        $info .= "<li>Número de Páginas: " . $this->getNumeroPaginas() . "</li>";
        $info .= "<li>Autoría: " . $this->getAutoria() . "</li>";
        $info .= "<li>Número de Ejemplares Disponibles: " . $this->getNumeroEjemplaresDisponibles() . "</li>";
        $info .= "</ul>";
        return $info;
    }

    // Método __toString para imprimir el libro de forma legible
    public function __toString(): string {
        return "Libro: " . $this->getTitulo() . " de " . $this->getAutoria() . " - ISBN: " . $this->getIsbn() . " - Páginas: " . $this->getNumeroPaginas();
    }
}


?>
