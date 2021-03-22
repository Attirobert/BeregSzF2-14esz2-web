<?php
echo ("<p> Ez a felső sor</p>");

$a = "Változóból iratva";
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <title><?php echo $a; ?></title>
    <meta name="Author" content="Kovács Attila">
</head>

<body>
    <h1>PHP kód </h1>
    <?php
    $a = "Ezt echo paranccsal íratom ki változóból.";
    echo "<h3>$a</h3>";
    print "<p>Ezt print paranccsal íratom ki.</p>";
    ?>
</body>
<?php
echo "<h3>Ezt &lt/body&gt és &lt/html&gt között íratom ki.</h3>";
?>

</html>

<?php
echo "<h3>Ezt a html tag után íratom ki.</h3>";
?>