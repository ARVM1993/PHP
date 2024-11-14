<?php
class Principal extends Plato
{
    private bool $gluten;

    public function __construct($nombre, $precio, $gluten)
    {
        parent::__construct($nombre, $precio);
        $this->gluten = $gluten;
    }

    public function __toString()
    {
        $ret = parent::__toString();
        if ($this->gluten) {
            $ret .= "Sí ";
        } else {
            $ret .= "No ";
        }
        $ret .= "tiene gluten";
        return $ret;
    }


    /**
     * Get the value of gluten
     */
    public function getGluten()
    {
        return $this->gluten;
    }
}