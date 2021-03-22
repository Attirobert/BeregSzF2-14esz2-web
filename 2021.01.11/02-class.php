<?php
define("BR", "<br>");
define("SOR", "<br>============================<br>");
echo "Osztály létrehozása";

class alkalmazott
{
    var $nev;
    var $cim;
    var $datum;

    // Konstruktor metódus
    function alkalmazott($pNev = "", $pCim = "", $pDatum = 1900)
    {
        $this->nev = $pNev;
        $this->cim = $pCim;
        $this->datum = $pDatum;
    }

    function koszon()
    {
        print "<br>Üdvözlöm! A nevem " . $this->nev;
    }
}

$valt = new alkalmazott("Attila", "Debrecen");
echo BR . $valt->nev . "; " . $valt->cim;

$valt2 = new alkalmazott();
$valt2->nev = "Berci";
$valt2->cim = "Budapest";
echo BR . $valt2->nev . "; " . $valt2->cim;


echo SOR . " Új dolgozók" . BR;
$Mari = new alkalmazott("Mari", "Debrecen", "1966-11-22");
$Juci = new alkalmazott("Juci", "Miskolc", "1964-11-22");
$Zoli = new alkalmazott("Zoli", "Diósd", "1962-11-22");


class mernok extends alkalmazott
{
    var $kepzettseg;

    // Konstruktor metódus
    function __construct($pNev = "", $pCim = "", $pDatum = 1900, $pKepzettseg = "")
    {
        alkalmazott::alkalmazott($pNev, $pCim, $pDatum);
        $this->kepzettseg = $pKepzettseg;
    }

    function koszon()
    {
        alkalmazott::koszon();
        print " a képzettségem: " . $this->kepzettseg;
    }
}

echo SOR . " Mérnökök " . BR;
$eva = new mernok("Éva");
$eva->cim = "Pest";
$eva->datum = 1978;
$eva->kepzettseg = "Építész";
$istvan = new mernok("István", "Buda", 1962, "Gépész");
$agnes = new mernok("Ágnes", "Vác", 1972);
$agnes->kepzettseg = "Villamosmérnök";

print BR . $eva->nev . ", " . $eva->cim . ", " . $eva->datum . ", " . $eva->kepzettseg . BR;
print BR . $istvan->nev . ", " . $istvan->cim . ", " . $istvan->datum . ", " . $istvan->kepzettseg . BR;
print BR . $agnes->nev . ", " . $agnes->cim . ", " . $agnes->datum . ", " . $agnes->kepzettseg . BR;
$eva->koszon();
$istvan->koszon();
$agnes->koszon();
