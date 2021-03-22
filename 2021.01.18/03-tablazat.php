<?php
/* Táblázatkészítő program 
=========================== 
Egy táblázat osztályt hozunk létre, amelyben az egyes oszlopokat nevük alapján is elérhetjük. Az adatszerkezet soralapú lesz, a böngészõben való megjelenítést pedig egy függvény végzi. A táblázat formázásával egyelőre nem foglalkozunk.
*/
/* Az osztály 
    adatok: tablazatsorok[], oszlopNevek[], oszlopszam */

class Tablazat
{
    // Osztályváltozók (property)
    var $tablaSorok = array();
    var $oszlopNevek = array();
    var $oszlopSzam;

    // Konstruktor
    function Tablazat($oszlopNevek)
    {
        $this->oszlopNevek = $oszlopNevek;
        $this->oszlopSzam = count($oszlopNevek);
    }

    /* Új sor tagfüggvény
    A $sor tömb nem tartalmaz oszlopneveket, de feltételezzük, hogy az adatok az oszlopnevek sorrendjében vannak */
    function ujSor($sor)
    {
        // Ha a megadott elemek ($sor) száma nem egyenlő az oszlopok számával, akkor kilépek
        if (count($sor) != $this->oszlopSzam) return false;

        array_push($this->tablaSorok, $sor);
        return true;
    }

    /* Új sor tagfüggvény oszlopnevekkel
    A $sor tömb tartalmaz oszlopneveket */
    function ujNevesSor($asszocSor)
    {
        // Ha a megadott elemek ($sor) száma nem egyenlő az oszlopok számával, akkor kilépek
        //if (count($asszocSor) != $this->oszlopSzam) return false;

        // Feltöltés
        $sor = array();
        foreach ($this->oszlopNevek as $oszlopNev) {
            if (!isset($asszocSor[$oszlopNev])) $asszocSor[$oszlopNev] = "";
            $sor[] = $asszocSor[$oszlopNev];
        }

        array_push($this->tablaSorok, $sor);
    }

    /* A táblázat egyszerű kiíratása */
    function kiir()
    {
        foreach ($this->oszlopNevek as $oszlopNev) {
            echo "<B>$oszlopNev</B>";
        }

        echo "\n";

        foreach ($this->tablaSorok as $y) {
            foreach ($y as $xcella) echo "$xcella";
            echo "<br>";
        }
    }
}

class HtmlTablazat extends Tablazat
{
    var $hatterSzin;
    var $cellaMargo = 2;

    function HtmlTablazat($oszlopNevek, $hatter = "#0ff")
    {
        // Ősosztály metódusának meghívása
        Tablazat::Tablazat($oszlopNevek);
        $this->hatterSzin = $hatter;
    }

    function cellaMargoAllit($margo)
    {
        $this->cellaMargo = $margo;
    }

    /* A táblázat formázott kiíratása */
    function kiir()
    {
        echo "<table cellPadding ='" . $this->cellaMargo . "' border=1><br><tr><br>";

        // Fejléc iratás
        foreach ($this->oszlopNevek as $oszlopNev) {
            //echo "<th bgcolor=\"" . $this->hatterSzin . "\"<B>" . $oszlopNev . "</B></th>";
            echo "<th bgcolor='$this->hatterSzin'<B>$oszlopNev</B></th>";
        }

        echo "</tr><br>";

        // Sorok iratása
        foreach ($this->tablaSorok as $y) {
            echo "<tr><br>";
            foreach ($y as $xcella) echo "<td bgcolor=\"" . $this->hatterSzin . "\">" . $xcella . "</td>";
            echo "</tr><br>";
        }

        echo "</table>";
    }
}



$proba = new Tablazat(array("a", "b", "c"));
$proba->ujSor(array(1, 2, 3));
$proba->ujSor(array(4, 5, 6));
$proba->ujNevesSor(array("b" => 0, "a" => 6, "c" => 33));
$proba->kiir();

echo "-----------------------------";
$proba2 = new HtmlTablazat(array("a", "b", "c"), "#00ff00");
$proba2->cellaMargoAllit(10);
$proba2->ujSor(array(1, 2, 3));
$proba2->ujSor(array(4, 5, 6));
$proba2->ujNevesSor(array("b" => 0, "a" => 6, "c" => 33));
$proba2->kiir();
