<?php
// Változók megadása

$name = $email = $gender = $website = $comment = "";
$errName = $errEmail = $errGender = $errWebsite = $errComment = "";
$regNyelvi = "/^[a-zA-Z ]*$/"; // Angol
$regURL = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Az oldalra kitöltés után kerültem
    if (empty($_POST["name"])) {
        $errName = " * A név kitöltése kötelező";
    } else {
        // Egyéb ellenörzések elvégzése
        // Az adat megtisztítása. Lásd lentebb
        $name = test_input($_POST["name"]);

        // A név csak az angol ABC karaktereit és whitespace karaktereket tartalmaz
        if (!preg_match($regNyelvi, $name)) {
            $errName = "A név csak az angol ABC karaktereit és whitespace karaktereket tartalmazhat! ";
        }
    }

    if (empty($_POST["email"])) {
        $errEmail = "Az email kitöltése kötelező";
    } else {
        // Egyéb ellenörzések elvégzése
        // Az adat megtisztítása. Lásd lentebb
        $email = test_input($_POST["email"]);

        // Email formai ellenőrzése
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errEmail = "Nem megfelelő email cím! ";
        }
    }

    if (empty($_POST["website"])) {
        $errWebsite = "Az website kitöltése kötelező";
    } else {
        // Egyéb ellenörzések elvégzése
        // Az adat megtisztítása. Lásd lentebb
        $website = test_input($_POST["website"]);

        // Website formai ellenőrzése: 1. ver
        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $errWebsite = "Nem megfelelő website cím! ";
        }

        // Másik megoldás a website formai ellenőrzésére: 2. ver
        /* if (!preg_match($regURL, $website)) {
            $errWebsite = "Nem megfelelő website cím!! ";
        } */
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        // Egyéb ellenörzések elvégzése
        // Az adat megtisztítása. Lásd lentebb
        $comment = test_input($_POST["comment"]);
    }


    if (empty($_POST["gender"])) {
        $errGender = "A gender kitöltése kötelező";
    } else {
        // Egyéb ellenörzések elvégzése
        // Az adat megtisztítása. Lásd lentebb
        $gender = test_input($_POST["gender"]);
    }
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <title>Form validálás</title>
    <meta name="Author" content="Kovács Attila">
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Form validálás</h2>
    <p><span class="error">* kötelező mező</span></p>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        Név: <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error">* <?php echo $errName; ?> </span><br>

        E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $errEmail; ?> </span><br>

        Website: <input type="text" name="website" value="<?php echo $website; ?>">
        <span class="error">* <?php echo $errWebsite; ?> </span><br>

        Megjegyzés: <br><textarea rows="5" cols="40" name="comment"><?php echo $comment; ?></textarea><br><br>
        <span class="error"><?php echo $errComment; ?> </span><br>

        Nő/Férfi: <span class="error">* <?php echo $errGender; ?> </span><br>
        <br><input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Nő<br>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Férfi<br><br>



        <input type="submit" value="Rendben" name="submit">
    </form>

    <?php
    function test_input($data)
    {
        $data = trim($data); // felesleges szóközök leszedése
        $data = stripslashes($data); // kiszedi a "/" jeleket
        $data = htmlspecialchars($data); // Átírja a html vezérlőként értelmezhető karaktereket html kódolásra
        return $data;
    }

    echo "Az adatok feldolgozása sikeres";
    ?>
</body>

</html>