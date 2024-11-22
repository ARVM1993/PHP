<?php

function dividir($numeroDecimal1, $numeroDecimal2=1){
    if ($numeroDecimal2 == 0) {
        return false;
    }else {
        return $numeroDecimal1/$numeroDecimal2;
    }
}

    function concatenar(...$parametros) {
        return implode('', $parametros);
    }


