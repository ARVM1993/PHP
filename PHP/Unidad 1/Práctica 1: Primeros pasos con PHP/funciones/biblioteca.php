<?php

$libros = [
    'libro1' => [
        'titulo' => 'la mala costumbre',
        'autoria' => 'alana s. portero',
        'año' => 2023,
    ],
    'libro2' => [
        'titulo' => 'lo que hay',
        'autoria' => 'sara torres',
        'año' => 2022
    ],
    'libro3' => [
        'titulo' => 'las malas',
        'autoria' => 'camila sosa villada',
        'año' => 2019  
    ]
];

$librosConPaginas = [
    'libro1' => [
        'titulo' => 'la mala costumbre',
        'autoria' => 'alana s. portero',
        'año' => 2023,
        'paginas' => 336 
    ],
    'libro2' => [
        'titulo' => 'lo que hay',
        'autoria' => 'sara torres',
        'año' => 2022
       
    ],
    'libro3' => [
        'titulo' => 'las malas',
        'autoria' => 'camila sosa villada',
        'año' => 2019,
        'paginas' => 240 
    ]
];

function formatear($cadenaCaracteres, $booleano) {
    if ($booleano === true) {
        // Divide la cadena en palabras
        $palabras = explode(" ", $cadenaCaracteres);
        foreach ($palabras as &$palabra) {
            // Capitaliza la primera letra de cada palabra
            $palabra[0] = strtoupper($palabra[0]);
        }
        return implode(" ", $palabras); // Junta las palabras
    } elseif ($booleano === false) {
        // Capitaliza solo la primera letra de la cadena completa
        $cadenaCaracteres[0] = strtoupper($cadenaCaracteres[0]);
        return $cadenaCaracteres;
    }

    return $cadenaCaracteres; // Devuelve la cadena original si no se cumple ningún caso
}

function antiguedad($año1, $año2 = null) {
    if ($año2 === null) {
        $añoActual = date("Y");
        $antiguedadLibro = $añoActual - $año1;
    } else {
        $antiguedadLibro = abs($año1 - $año2);
    }
    return $antiguedadLibro;
}

function año ($año){
    if ($año > 1) {
        return "  años desde su publicación es ";
    }elseif ($año  == 1) {
        return " año desde su publicación es ";
    }
        return " es del mismo año";
}

foreach ($libros as $libro) {
    echo "El libro " . formatear($libro["titulo"], false) . " escrito por " .
        formatear($libro["autoria"], true) . " tiene " .
        antiguedad($libro["año"]) . año(antiguedad($libro["año"])) . $libro["año"] . ".<br>";
}

function mostrarPaginas($libro) {
       
        if (isset($libro["paginas"])) {
            return $libro["paginas"];
        } else {
            return "No definido";
        }
    }

?>

</body>
</html>