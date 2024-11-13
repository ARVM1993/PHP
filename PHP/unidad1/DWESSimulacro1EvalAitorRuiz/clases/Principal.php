<?php

include_once "./Plato.php";
class Principal extends Plato{
    public function __construct(
        string $nombre, 
        float $precio,
        private bool $tieneGluten){
        parent::__construct(
            $nombre,
            $precio
        );
        {}

    }

        public function getTieneGluten(){
            return $this->tieneGluten ? "si" : "no";
        }

       
        public function setTieneGluten($tieneGluten){
                $this->tieneGluten = $tieneGluten;

        }

        public function __toString(){
            $gluten = $this->tieneGluten ? "tiene" : "no tiene";
            return "El plato se llama {$this->getNombre()}, cuesta {$this->getPrecio()} 
            y $gluten gluten.";
        }
    }