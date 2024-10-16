<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
function filtrar($arraydeNumeros, $booleano = true) {
    $arrayDePares = []; 
    foreach ($arraydeNumeros as $indice => $valor) {
        if ($booleano && $indice % 2 == 0) {
            $arrayDePares[] = $valor;
        } 
        elseif (!$booleano && $indice % 2 !== 0) {
            $arrayDePares[] = $valor;
        }
    }

    return $arrayDePares; 
}

function sumarNegativos (...$parametros){
if (count($parametros) == 0) {
    return 0;

}
$sumarNegativos = 0;
foreach ($parametros as $valor) {
    if ($valor < 0) {
        $sumarNegativos += $valor;
    }
}
return $sumarNegativos;

}

function describirPersona($arrayPersonas){
    $nombre = $arrayPersonas["nombre"];
    $edad = $arrayPersonas["edad"];
    if ($arrayPersonas["matricula"] == true) {
        $matricula = "sí";
    }elseif ($arrayPersonas["matricula"] == false) {
        $matricula = "no";
    }else {
       return "dato invalido";
    }

    return $nombre . " tiene " . $edad . " años y " . $matricula . " tiene matrícula ";
 
}

function calcularMedias($calificaciones){
    $medias =[];
    $suma =0;

    foreach ($calificaciones as $nombre => $nota) {
        if (count($nota) > 0) {
            $suma =array_sum($nota); 
            $cantidad =count($nota);
            $media = $suma/$cantidad;
            $medias[$nombre] = $media;
        }
        
    }
    return $medias;

}

/*
  Esta función comprobará si un alimento de la array contiene alérgenos y
  nos devolverá los alérgenos asociados al alimento de existir 
  o un mensaje de error si el alimento no se encuentra.
 
  Pasaremos como parámetros estas variables:
  
  $alimento: String que representa el nombre del alimento a verificar.
  $listaAlimentos: array asociativo donde las claves son nombres de alimentos 
  y los valores son arrays de alérgenos asociados a cada alimento.
 
  return: nos devolverá un String de alérgenos si el alimento existe en la lista. 
 */
function verificarAlergenos($alimento, $listaAlimentos) {
    foreach ($listaAlimentos as $key => $alergenos) {
        if ($key === $alimento) {
            return implode (' ' , $alergenos); 
        }
    }
}



?>   

</body>
</html>