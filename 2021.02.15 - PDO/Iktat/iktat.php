<?php
require "Classes/db.php";

// Megvizsgálom, hogy jogosan van-e az oldalon
session_start();
if (!isset($_SESSION["user"])) {
    // ha nem, akkor visszairányítom a belépéshez
    header("location: index.php");
}

// Adatbázis megnyitása
$db = new DbConnect();
$db->Connection("iktato");

// Userek lekérése a combobox-hoz
$tomb = $db->selectUpload();

// Adatok
if (isset($_POST["iktat"])) {
    $datum = $_POST["datum"];
    $cimzett = $_POST["cimzett"];
    $targy = $_POST["targy"];
    $leiras = $_POST["leiras"];

    // Rögzítés az adatbázisba
    if (!$db->letterIns($cimzett, $datum, $targy, $leiras)) echo "Az iktatás nem sikerült! Próbálja újra!";
}

$db = null;
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <title>Iktatás</title>
    <meta name="Author" content="Kovács Attila">
</head>

<body>
    <h1>Iktatás</h1>

    <form method="post">
        Érkezett: <input type="date" name="datum" id="datum" required><br>
        Címzett: <select name="cimzett" id="címzett">
            <option selected>Válasszon címzettet</option>
            <?php
            // lista feltöltése
            foreach ($tomb as $key) {
                echo "<option value= $key[ID_user]>$key[Nev]";
            }
            ?>
        </select>
        <br>
        Tárgy: <input type="text" name="targy" id="targy"><br>
        Leírás:
        <!-- <input type="text" name="leiras" id="leiras"><br> -->
        <textarea rows="5" name="leiras" id="leiras"></textarea><br>
        <br>
        <button type="submit" name="iktat" id="iktat">Iktat</button>
    </form>
</body>

</html>