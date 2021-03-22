<?php
$br = "<br>";
$sor = $br . "============================" . $br;

$a = 3;
$b = 2.3;
$c = "2.9";
$d = true;
$df = false;

echo "A változók:";
echo $br . '$a =' . $a;
echo $br . '$b =' . $b;
echo $br . '$c =' . $c;
echo $br . '$d =' . $d;
echo $br . '$df =' . $df . $sor;

echo 'A $a típusa: ' . gettype($a) . $br;
echo 'A $b típusa: ' . gettype($b) . $br;
echo 'A $c típusa: ' . gettype($c) . $br;
echo 'A $d típusa: ' . gettype($d) . $br;
echo 'A $df típusa: ' . gettype($df) . $br . $sor;

echo '$c = ' . $c . " a típusa: " . gettype($c) . $br;
settype($c, "integer");
echo '$c = ' . $c . " a típusa: " . gettype($c) . $br . $sor;

echo '$a = ' . $a . " a típusa: " . gettype($a) . $br;
$a = (float)$a;
echo '(double)$a = ' . $a . " a típusa: " . gettype($a) . $br . $sor;
