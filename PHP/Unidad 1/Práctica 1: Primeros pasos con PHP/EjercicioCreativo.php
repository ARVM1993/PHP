<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enfrentamientos Dragon Ball</title>

</head>
<body>
    <h1>Enfrentamientos de Dragon Ball</h1>

    <?php
    // Array asociativo con personajes, su vida y habilidades
    $personajes = [
        "Goku" => ["vida"=>200, "fuerza" => rand(0,100), "tecnica" => "Kamehameha"],
        "Vegeta" => ["vida"=>200, "fuerza" => rand(0,100), "tecnica" => "Big Bang"],
        "Gohan" => ["vida"=>200, "fuerza" => rand(0,100), "tecnica" => "Masenko"],
        "Piccolo" => ["vida"=>200, "fuerza" => rand(0,100), "tecnica" => "Special Beam Cannon"],
        "Trunks" => ["vida"=>200, "fuerza" => rand(0,100), "tecnica" => "Burning Attack"],
        "Frieza" => ["vida"=>200, "fuerza" => rand(0,100), "tecnica" => "Death Beam"],
        "Celula" => ["vida"=>200, "fuerza" => rand(0,100), "tecnica" => "Kamehameha perfecto"],
        "Bu" => ["vida"=>200, "fuerza" => rand(0,100), "tecnica" => "Destruccion Planetaria"],


    ];

    // Función para comprobar si los personajes están al mismo nivel de vida
    function agruparPersonajes($personajes) {
        $nombres = array_keys($personajes); // Obtener solo los nombres
        shuffle($nombres); // Mezclar los nombres aleatoriamente
        $grupos = []; // Inicializar un array para almacenar los grupos
    
        // Agrupar de 2 en 2
        for ($i = 0; $i < count($nombres); $i += 2) {
            // Asegurarse de que no se salga del array
            if (isset($nombres[$i + 1])) {
                $grupos[] = [$nombres[$i], $nombres[$i + 1]]; // Agregar un grupo de 2
            } else {
                $grupos[] = [$nombres[$i]]; // Si hay un número impar, agregar el último personaje solo
            }
        }
    
        return $grupos; // Devolver los grupos formados
    }
    
    // Ejecutar la función
    $gruposDePersonajes = agruparPersonajes($personajes);
    
    // Mostrar los grupos
    echo "<h2>Grupos de Personajes:</h2>";
    foreach ($gruposDePersonajes as $grupo) {
        echo "<p>Grupo: " . implode(" y ", $grupo) . "</p>";
    }
    ?>
</body>
</html>
