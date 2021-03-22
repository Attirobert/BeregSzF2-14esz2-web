<?php
$mf2 = "";
$mfile = fopen("szotar.txt", "r");
while (!feof($mfile)) {
    # code...
    $mf2 .= fgetc($mfile);
}
fclose($mfile);
echo $mf2;
