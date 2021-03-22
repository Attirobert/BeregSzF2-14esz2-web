<?php
// Osztály becsatolása
require "Classes/db.php";

// Kapcsolat objektum létrehozása
$db = new DbConnect();
$db->Connection("iktato");

$tomb = $db->allList();

// Adatbázis lezárása
$db = null;

?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <title>Users lista</title>
    <meta name="Author" content="Kovács Attila">
</head>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Név</th>
            <th>Jelszó</th>
            <th>Admin</th>
        </tr>
        <?php
        foreach ($tomb as $key) {
            echo "<tr><td>" . $key['ID_user'] . "</td><td>" . $key['Nev'] . "</td><td>" . $key['Jelszo'] . "</td><td>" . $key['Admin'] . "</td></tr>";
        }

        ?>
    </table>

</body>

</html>