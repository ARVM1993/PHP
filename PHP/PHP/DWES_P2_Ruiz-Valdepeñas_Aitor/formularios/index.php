<?php
//phpinfo();
ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once '../clases/Libro.php';
require_once '../clases/Revista.php';
require_once '../clases/EjemplarImpreso.php';

session_start();
var_dump($_SESSION);
if (!isset($_SESSION['libros'])) {
    $_SESSION['libros'] = [];
}

if (!isset($_SESSION['revistas'])) {
    $_SESSION['revistas'] = [];
}



$isbnLibro = $tituloLibro = $paginasLibro = $autorLibro = $ejemplaresLibro = "";
$isbnErrLibro = $tituloErrLibro = $paginasErrLibro = $autorErrLibro = $ejemplaresErrLibro = "";
$erroresLibro = false;

$isbnRevista = $tituloRevista = $paginasRevista = $prestadosRevista = "";
$isbnErrRevista = $tituloErrRevista = $paginasErrRevista = $prestadosErrRevista = "";
$erroresRevista = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['crear_libro'])) {
        $isbnLibro = htmlspecialchars($_POST["isbnLibro"]);
        $tituloLibro = htmlspecialchars($_POST["tituloLibro"]);
        $paginasLibro = $_POST["paginasLibro"];
        $autorLibro = htmlspecialchars($_POST["autorLibro"]);
        $ejemplaresLibro = $_POST["ejemplaresLibro"];

        if (empty($isbnLibro)) {
            $isbnErrLibro = "El ISBN es obligatorio";
            $erroresLibro = true;
        }
        if (empty($tituloLibro)) {
            $tituloErrLibro = "El título es obligatorio";
            $erroresLibro = true;
        }
        if (empty($paginasLibro)) {
            $paginasErrLibro = "El número de páginas es obligatorio";
            $erroresLibro = true;
        }
        if (empty($autorLibro)) {
            $autorErrLibro = "El autor es obligatorio";
            $erroresLibro = true;
        }
        if ($ejemplaresLibro < 0) {
            $ejemplaresErrLibro = "El número de ejemplares no puede ser negativo";
            $erroresLibro = true;
        }

        if (!$erroresLibro) {
            $libro = new Libro($isbnLibro, $tituloLibro, $paginasLibro, $autorLibro, $ejemplaresLibro);
            $_SESSION['libros'][] = $libro;
            $isbnLibro = $tituloLibro = $paginasLibro = $autorLibro = $ejemplaresLibro = "";

        }
    }

    if (isset($_POST['crear_revista'])) {
        $isbnRevista = htmlspecialchars($_POST["isbnRevista"]);
        $tituloRevista = htmlspecialchars($_POST["tituloRevista"]);
        $paginasRevista = $_POST["paginasRevista"];
        $prestadosRevista = $_POST["prestadosRevista"];

        if (empty($isbnRevista)) {
            $isbnErrRevista = "El ISBN es obligatorio";
            $erroresRevista = true;
        }
        if (empty($tituloRevista)) {
            $tituloErrRevista = "El título es obligatorio";
            $erroresRevista = true;
        }
        if (empty($paginasRevista)) {
            $paginasErrRevista = "El número de páginas es obligatorio";
            $erroresRevista = true;
        }

        if (!$erroresRevista) {
            $revista = new Revista($isbnRevista, $tituloRevista, $paginasRevista, $prestadosRevista);
            $_SESSION['revistas'][] = $revista;
            $isbnRevista = $tituloRevista = $paginasRevista = $prestadosRevista = "";

        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Libros y Revistas</title>
    <link rel="stylesheet" type="text/css" href="../estilos/estilo.css">
    <link rel="stylesheet" type="text/css" href="../estilos/estiloIndex.css">
</head>
<body>

<h1>Formulario de Libros y Revistas</h1>

<div class="form-container">
    <h2>Crear Libro</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>ISBN:</label><br>
        <input type="text" name="isbnLibro" value="<?= htmlspecialchars($isbnLibro) ?>"><br>
        <span style="color: red;"><?= $isbnErrLibro ?></span><br>

        <label>Título:</label><br>
        <input type="text" name="tituloLibro" value="<?= htmlspecialchars($tituloLibro) ?>"><br>
        <span style="color: red;"><?= $tituloErrLibro ?></span><br>

        <label>Número de Páginas:</label><br>
        <input type="number" name="paginasLibro" value="<?= htmlspecialchars($paginasLibro) ?>"><br>
        <span style="color: red;"><?= $paginasErrLibro ?></span><br>

        <label>Autor:</label><br>
        <input type="text" name="autorLibro" value="<?= htmlspecialchars($autorLibro) ?>"><br>
        <span style="color: red;"><?= $autorErrLibro ?></span><br>

        <label>Número de Ejemplares:</label><br>
        <input type="number" name="ejemplaresLibro" value="<?= htmlspecialchars($ejemplaresLibro) ?>"><br>
        <span style="color: red;"><?= $ejemplaresErrLibro ?></span><br>

        <input type="submit" name="crear_libro" value="Crear Libro">
    </form>
</div>

<div class="form-container">
    <h2>Crear Revista</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>ISBN:</label><br>
        <input type="text" name="isbnRevista" value="<?= htmlspecialchars($isbnRevista) ?>"><br>
        <span style="color: red;"><?= $isbnErrRevista ?></span><br>

        <label>Título:</label><br>
        <input type="text" name="tituloRevista" value="<?= htmlspecialchars($tituloRevista) ?>"><br>
        <span style="color: red;"><?= $tituloErrRevista ?></span><br>

        <label>Número de Páginas:</label><br>
        <input type="number" name="paginasRevista" value="<?= htmlspecialchars($paginasRevista) ?>"><br>
        <span style="color: red;"><?= $paginasErrRevista ?></span><br>

        <label>Prestados:</label><br>
        <input type="number" name="prestadosRevista" value="<?= htmlspecialchars($prestadosRevista) ?>"><br>

        <input type="submit" name="crear_revista" value="Crear Revista">
    </form>
</div>

<h2>Lista de Libros</h2>
<table>
    <tr>
        <th>ISBN</th>
        <th>Título</th>
        <th>Número de Páginas</th>
        <th>Autor</th>
        <th>Número de Ejemplares</th>
    </tr>
    <?php
    if (isset($_SESSION['libros']) && count($_SESSION['libros']) > 0) {

        
        foreach ($_SESSION['libros'] as $libro) {
            echo "<tr>
                    <td>{$libro->getIsbn()}</td>
                    <td>{$libro->getTitulo()}</td>
                    <td>{$libro->getNumeroPaginas()}</td>
                    <td>{$libro->getAutoria()}</td>
                    <td>{$libro->getNumeroEjemplaresDisponibles()}</td>
                  </tr>";
        }
    }
    ?>
</table>

<h2>Lista de Revistas</h2>
<table>
    <tr>
        <th>ISBN</th>
        <th>Título</th>
        <th>Número de Páginas</th>
        <th>Revistas Prestadas</th>
    </tr>
    <?php
    if (isset($_SESSION['revistas']) && count($_SESSION['revistas']) > 0) {
        foreach ($_SESSION['revistas'] as $revista) {
            echo "<tr>
                    <td>{$revista->getIsbn()}</td>
                    <td>{$revista->getTitulo()}</td>
                    <td>{$revista->getNumeroPaginas()}</td>
                    <td>{$revista->getCantidadRevistasPrestadas()}</td>
                  </tr>";
        }
    }
    ?>
</table>

</body>
</html>
