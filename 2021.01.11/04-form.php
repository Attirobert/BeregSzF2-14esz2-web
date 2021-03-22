<?php
if (isset($_POST["nev"])) {
    $nev = $_POST["nev"];
    echo "Üdvözlöm " . $nev . "!";
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <title>Form kevert</title>
    <meta name="Author" content="Kovács Attila">
</head>

<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        Név: <input type="text" name="nev">
        <input type="submit" value="Mehet!">
    </form>
</body>

</html>