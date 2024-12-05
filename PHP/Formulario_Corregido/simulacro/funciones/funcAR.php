<?php

function dividir($a, $b = 1)
{
    if ($b == 0) {
        return false;
    } else {
        return $a / $b;
    }
}

function concatenar(...$c)
{
    $ret = "";
    for ($i = 0; $i < count($c); $i++) {
        $ret .= $c[$i];
    }
    return $ret;
}