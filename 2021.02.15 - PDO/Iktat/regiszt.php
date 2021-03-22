<?php
require "Classes/db.php";

// Beléptetés
if (isset($_POST["reg"])) {
    $user = $_POST["nev"];
    $pwd = $_POST["pwd"];
    $pwd2 = $_POST["pwd2"];
    $admin = 0;
    //$admin = $_POST["admin"];

    // Két jelszó egyezése
    if ($pwd == $pwd2) {

        // Adatbázis megnyitása
        $db = new DbConnect();
        $db->Connection("iktato");

        // Van-e ilyen Név az adatbázisban
        if ($db->UserNameCheck($user)) {
            // Már van ilyen felhasználó!
            echo "<script>alert('Már van ilyen felhasználó!')</script>";
        } else {
            // Regisztrálás az alkalmazásba
            //if ($db->userIns($user, $pwd, $admin)) {
            if (true) {
                session_start();
                $_SESSION["kuldo"] = "regiszt";
                $db = null;
                header("location: index.php");
            } else {
                $db = null;
                echo "<script>alert('Sikertelen regisztráció!')</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <title>Regisztráció</title>
    <meta name="Author" content="Kovács Attila">
</head>

<body>
    <h1>Regisztrálás</h1>
    <form action="" method="post">
        <input type="text" name="nev" id="nev" required minlength="3" placeholder="Adja meg a nevét!"><br><br>
        <input type="text" name="pwd" id="pwd" required minlength="3" placeholder="Adja meg egy jelszót!"><br><br>
        <input type="text" name="pwd2" id="pwd2" required minlength="3" placeholder="Kérem ismételje meg a jelszót!"><br><br>
        <input type="checkbox" name="admin" id="admin">Adminisztrátor<br><br>
        <button type="submit" name="reg">Regisztrálok</button>
    </form>
</body>

</html>