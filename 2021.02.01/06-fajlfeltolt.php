<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename(($_FILES["fajlFeltolt"]["name"]));
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fajlFeltolt"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
            // Fájl feltöltése
            if (move_uploaded_file($_FILES["fajlFeltolt"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["fajlFeltolt"]["name"])) . " has been uploaded.";
            }
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <title>Fájl feltöltés</title>
    <meta name="Author" content="Kovács Attila">
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        Válasszon fájlt:
        <input type="file" name="fajlFeltolt" id="fajlFeltolt">
        <input type="submit" value="Feltöltés" name="submit">
    </form>
</body>

</html>