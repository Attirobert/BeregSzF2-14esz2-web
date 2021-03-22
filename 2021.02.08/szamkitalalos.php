<?php
session_start();
$uzenet = "";
$szam2 = null;

if (!isset($_SESSION["count"])) {
    $random = rand(1, 10);
    $_SESSION["count"] = $random;
    //unset($_GET);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["szamBek"])) {
    $szam2 = $_GET["szamBek"];
    if (isset($_SESSION["count"]) && $_SESSION["count"] == $szam2) {
        $uzenet = "Eltaláltad";
        session_destroy();
    } elseif (isset($_SESSION["count"]) && $_SESSION["count"] > $szam2) {
        $uzenet = "Nagyobbra gondoltam.";
    } else
        $uzenet = "Kisebbre gondoltam.";
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Kérem a számot!</h2>
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input type="number" name="szamBek" value="0">
        <input type="submit" name="submit" value="Elküld">
        <p id="ran"><?php if (isset($_SESSION["count"])) echo "A gondolt szám: " . $_SESSION["count"] ?></p>
        <p id="be"><?php if ($szam2) echo "A beírt szám: " . $szam2 ?> </p>
        <p id="tal"> <?php echo $uzenet ?> </p>

    </form>
</body>

</html>