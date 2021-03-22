<?php
$mFile = fopen("szotar.txt", "r") or die("A fájl nem található");
$mf2 = fread($mFile, filesize("szotar.txt"));
fclose($mFile);
echo $mf2;
//echo readfile("szotar.txt", "r");
