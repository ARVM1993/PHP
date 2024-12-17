<?php
include_once "../funciones/securizar.php";
include_once "../database/funcionesDB.php";
include_once "../database/funcionesUsuarios.php";

$name = $weapon = "";
$choose = isset($_POST["choose"]) ? $_POST["choose"] : "0"; 
$nameErr = $chooseErr = $weaponErr = "";
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = securizar($_POST["name"]);

    if (empty($name)) {
        $nameErr = "No puede estar vacío.";
        $error = true;
    }

    if ($choose == "0") {
        $chooseErr = "Elige un personaje";
        $error = true;
    }

    if ($choose == "warrior") {
        $weapon = isset($_POST["weapon"]) ? $_POST["weapon"] : "0";
        if ($weapon == "0") {
            $weaponErr = "Elige un arma";
            $error = true;
        }
    }

    setcookie("name", $name, time() + 5 * 60);

    if (!$error) {
        $_SESSION["u"] = $name;
        header("Location: ./index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 30px auto;
            max-width: 600px;
        }
        h1 {
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .form-select, .form-control {
            border-radius: 5px;
        }
        .text-danger {
            font-size: 0.9rem;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="form-container">
        <h1>Create a Character</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="needs-validation" novalidate>

        <div class="mb-3">
                <label for="choose" class="form-label">Character's role:</label>
                <select name="choose" id="choose" class="form-select" required>
                    <option value="0" <?php if ($choose == "0") echo "selected"; ?>>Choose a role</option>
                    <option value="warrior" <?php if ($choose == "warrior") echo "selected"; ?>>Warrior</option>
                    <option value="mage" <?php if ($choose == "mage") echo "selected"; ?>>Mage</option>
                    <option value="juggernaut" <?php if ($choose == "juggernaut") echo "selected"; ?>>Juggernaut</option>
                </select>
                <div class="text-danger"><?php echo $chooseErr; ?></div>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>" required>
                <div class="text-danger"><?php echo $nameErr; ?></div>
            </div>

            <div id="weapon" class="mb-3">
                <?php if ($choose == "warrior") { ?>
                    <label for="weapon-select" class="form-label">Choose your weapon:</label>
                    <select name="weapon" id="weapon-select" class="form-select">
                        <option value="0">Choose a weapon</option>
                        <option value="sword" <?php if ($weapon == "sword") echo "selected"; ?>>Sword</option>
                        <option value="shield" <?php if ($weapon == "shield") echo "selected"; ?>>Shield</option>
                    </select>
                    <div class="text-danger"><?php echo $weaponErr; ?></div>
                <?php } ?>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
    const choose = document.getElementById('choose');
    const weaponContainer = document.getElementById('weapon');

    const warriorWeapons = ["Sword", "Shield"];

    choose.addEventListener("change", () => {
        weaponContainer.innerHTML = "";

        if (choose.value === "warrior") {
            const label = document.createElement("label");
            label.textContent = "Choose your weapon:";
            label.className = "form-label";
            weaponContainer.appendChild(label);

            const select = document.createElement("select");
            select.name = "weapon";
            select.id = "weapon-select";
            select.className = "form-select";

            const defaultOption = document.createElement("option");
            defaultOption.value = "0";
            defaultOption.textContent = "Choose a weapon";
            select.appendChild(defaultOption);

            warriorWeapons.forEach(weapon => {
                const option = document.createElement("option");
                option.value = weapon.toLowerCase();
                option.textContent = weapon;
                select.appendChild(option);
            });

            weaponContainer.appendChild(select);
        }
    });
</script>
</body>
</html>
