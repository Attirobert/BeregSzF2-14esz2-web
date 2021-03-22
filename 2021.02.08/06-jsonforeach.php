<?php

$jsonarr = '{"Apa" :35, "Anya" : 32, "Fiu" :13, "Lány" : 11}';

var_dump(json_decode($jsonarr));

$obj = json_decode($jsonarr, false);

foreach ($obj as $key => $value) {
    echo $key . "=>" . $value . "<br>";
}

$arr = json_decode($jsonarr, true);

foreach ($arr as $key => $value) {
    echo $key . "=>" . $value . "<br>";
}
