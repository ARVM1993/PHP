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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./style/createCharacterStyle.css">

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

// Function to create input fields dynamically
function createInputField(labelText, name, type, placeholder) {
    const div = document.createElement("div");
    div.className = "mb-3";

    const label = document.createElement("label");
    label.textContent = labelText;
    label.className = "form-label";
    div.appendChild(label);

    const input = document.createElement("input");
    input.type = type;
    input.name = name;
    input.id = name;
    input.className = "form-control";
    input.placeholder = placeholder;
    div.appendChild(input);

    return div;
}

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
    } else if (choose.value === "mage") {
        const typeInput = createInputField("Type:", "type", "text", "e.g., mage");
        const nameInput = createInputField("Name:", "mageName", "text", "Enter character's name");
        const levelInput = createInputField("Level:", "level", "number", "0");
        const numBattleInput = createInputField("Number of Battles:", "numBattle", "number", "0");

        weaponContainer.appendChild(typeInput);
        weaponContainer.appendChild(nameInput);
        weaponContainer.appendChild(levelInput);
        weaponContainer.appendChild(numBattleInput);
    } else if (choose.value === "juggernaut") {
        // Add special inputs for Juggernaut here if needed
    }
});
</script>
</body>
</html>
