<?php

abstract class EjemplarImpreso {

    private string $isbn;
    private string $titulo;
    private int $numeroPaginas;

    // Constructor para inicializar los valores de las propiedades
    public function __construct(string $isbn, string $titulo, int $numeroPaginas) {
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->numeroPaginas = $numeroPaginas;
    }

    // Métodos getter y setter
    public function getIsbn(): string {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): void {
        $this->isbn = $isbn;
    }

    public function getTitulo(): string {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void {
        $this->titulo = $titulo;
    }

    public function getNumeroPaginas(): int {
        return $this->numeroPaginas;
    }

    public function setNumeroPaginas(int $numeroPaginas): void {
        $this->numeroPaginas = $numeroPaginas;
    }

    // Métodos abstractos
    abstract public function prestar();   // Este método deberá ser implementado por las subclases
    abstract public function showInfo();  // Este método deberá ser implementado por las subclases

}
?>
