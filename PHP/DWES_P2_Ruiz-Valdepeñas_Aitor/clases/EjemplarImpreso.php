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

    abstract public function prestar();   
    abstract public function showInfo(); 

}
?>
