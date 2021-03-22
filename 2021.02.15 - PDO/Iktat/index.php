<?php
require "Classes/db.php";
session_start();
if (isset($_SESSION["kuldo"])) {
    if ($_SESSION["kuldo"] == "regiszt") {
        echo "<script>alert('Sikeres regisztráció! Jelentkezzen be!')</script>";
    }
}

// Minden esetben törlöm a session-t
session_destroy();

// Beléptetés
if (isset($_POST["login"])) {
    $user = $_POST["nev"];
    $pwd = $_POST["pwd"];

    // Adatbázis megnyitása
    $db = new DbConnect();
    $db->Connection("iktato");

    // Név-jelszó páros leellenőrzése az adatbázisban
    if ($db->LoginCheck($user, $pwd)) {
        // Sikeres azonosítás
        // session indítása
        session_start();
        $_SESSION["user"] = $user;
        
        // Beléptetés az alkalmazásba
        header("location: iktat.php");
    } else {
        // Sikertelen belépés
        $db = null;
        echo "<script>alert('Nincs ilyen felhasználó!')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <title>Belépés</title>
    <meta name="Author" content="Kovács Attila">
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="nev" id="nev" required minlength="3" placeholder="Adja meg a nevét!">
        <input type="text" name="pwd" id="pwd" required minlength="3" placeholder="Adja meg a jelszavát!">
        <button type="submit" name="login">Belépés</button>
    </form>
    <button type="submit" name="regiszt" onclick="regiszt();">Regisztráció</button>
</body>

<script>
    function regiszt() {
        window.location = "regiszt.php";
    }
</script>

</html>