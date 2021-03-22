<?php
$mfile = fopen("szotar2.txt", "w");
$szoveg = "Ez egy újabb szöveg";
fwrite($mfile, $szoveg);
$szoveg = "\nEz egy másik újabb szöveg";
fwrite($mfile, $szoveg);
fclose($mfile);
