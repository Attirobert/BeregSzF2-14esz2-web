<?php
$mfile = fopen("szotar2.txt", "a");
$szoveg = "\nEz a legújabb szöveg";
fwrite($mfile, $szoveg);
$szoveg = "\nEz egy másik legújabb szöveg";
fwrite($mfile, $szoveg);
fclose($mfile);
