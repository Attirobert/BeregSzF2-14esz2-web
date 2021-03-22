<?php
define("BR", "<br>");
define("SOR", "<br>============================<br>");
echo "Tömb létrehozása";
$tanulok = array("Marci", "Berci", "Hapci", "Morgó", "Tudor", "Puskás", "Hidegkuti");

$lanyok[] = "Éva";
$lanyok[] = "Zsuzsi";
$lanyok[] = "Mari";
$lanyok[] = "Ica";
$lanyok[] = "Ági";
$lanyok[10] = "Aranka";

$fiuk = array(0 => "Attila", 12 => "Bálint", 5 => "Zoli", 10 => "Péter");

print BR . "var_dump" . BR . "tanulók" . BR;
var_dump($tanulok);
print BR . "Lányok" . BR;
var_dump($lanyok);
print BR . "Fiúk" . BR;
var_dump($fiuk);

echo SOR . "Kiíratás" . BR . "for ciklussal";
for ($i = 0; $i < 7; $i++) {
    print BR . $tanulok[$i];
}
echo BR . "foreach ciklussal";
foreach ($fiuk as $index => $ertek) {
    print BR . $index . ":" . $ertek;
}

echo SOR . "Asszociatív tömb" . BR;
$apak = array("Q" => "Attila", "R" => "Bálint", "S" => "Zoli", "X" => "Péter");

echo BR . "foreach ciklussal";
foreach ($apak as $index => $ertek) {
    print BR . $index . ":" . $ertek;
}

print BR . $apak["S"];

echo SOR . "Asszociatív Tömb rendezése";
$apak2 = $apak;
sort($apak2);
foreach ($apak2 as $index => $ertek) {
    print BR . $index . ":" . $ertek;
}


echo SOR . "Tömb rendezése sort() metódussal";
$fiuk2 = $fiuk;
sort($fiuk2);
foreach ($fiuk2 as $index => $ertek) {
    print BR . $index . ":" . $ertek;
}

echo BR . "index:1 =>" . $fiuk2[1];

echo SOR . "Rendezés asort() metódussal" . BR;
$fiuk2 = $fiuk;
asort($fiuk2);
foreach ($fiuk2 as $index => $ertek) {
    print BR . $index . ":" . $ertek;
}

echo SOR . "Asszociatív Tömb rendezése asort() metódussal";
$apak2 = $apak;
asort($apak2);
foreach ($apak2 as $index => $ertek) {
    print BR . $index . ":" . $ertek;
}

echo SOR . "Rendezés ksort() metódussal" . BR;
$fiuk2 = $fiuk;
ksort($fiuk2);
foreach ($fiuk2 as $index => $ertek) {
    print BR . $index . ":" . $ertek;
}

echo SOR . "Asszociatív Tömb rendezése ksort() metódussal";
$apak2 = $apak;
ksort($apak2);
foreach ($apak2 as $index => $ertek) {
    print BR . $index . ":" . $ertek;
}

echo BR . "Ciklus hézagos tömb esetén" . BR;
echo count($fiuk) . BR;
for ($i = 0; $i < count($fiuk); $i++) {
    if (isset($fiuk[$i])) {
        print BR . $fiuk[$i];
    }
}
