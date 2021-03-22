<?php
$br = "<br>";
$sor = $br . "============================" . $br;

$a = true;
$b = 7;
$c = 16;

echo "A változók:";
echo $br . '$a =' . $a;
echo $br . '$b =' . $b;
echo $br . '$c =' . $c . $sor;

if ($a) {
    echo "Igaz ág" . $br;
} else {
    echo "Hamis ág" . $br;
}
