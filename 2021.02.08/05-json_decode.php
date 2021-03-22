<?php

$jsonarr = '{"Apa" :35, "Anya" : 32, "Fiu" :13, "Lány" : 11}';

var_dump(json_decode($jsonarr));

$obj = json_decode($jsonarr, false);
echo $obj->Apa;
//echo $obj["Anya"];
