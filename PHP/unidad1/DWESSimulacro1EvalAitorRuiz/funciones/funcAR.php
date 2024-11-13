<?php

function dividir(float $num1, float $num2=1 ){
    if ($num2 == 0){
        return false;
    } else{
        return $num1/$num2;
        
    }

}

function concatenar(...$variables){
    $cadena ="";
    foreach ($variables as $value){
        if (is_array($value)) {
            $cadena .= implode("", $value);
        }else{
            $cadena .= $value;
        }
    }
    return $cadena;
}

