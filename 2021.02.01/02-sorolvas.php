<?php
$mf2 = "";
$mfile = fopen("szotar.txt", "r");
while (!feof($mfile)) {
    # code...
    $mf2 .= fgets($mfile) . "<br>";
}
fclose($mfile);
echo $mf2;
