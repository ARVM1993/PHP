<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

$pizza  = "porción1 porción2 porción3 porción4 porción5 porción6";
$dividir = explode(" ", $pizza);
foreach ($dividir as $key => $porcion) {
    echo "Porción " . ($key + 1) . ", " . "\n";
}

    ?>
    
</body>
</html>