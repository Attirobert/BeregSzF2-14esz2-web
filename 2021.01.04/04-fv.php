<?php
define("BR", "<br>");
define("SOR", "<br>============================<br>");

echo date("Y.m.d, H:i:s ");

echo $sor;

function fv1($p1, $p2)
{
    $p1++;
    $p2--;

    echo "A paraméterek értéke a fv-ben:" . BR;
    echo '$p1 = ' . $p1 . BR;
    echo '$p2 = ' . $p2 . BR;
}

function fv2(&$p3, &$p4)
{
    $p3++;
    $p4--;

    echo "A paraméterek értéke a fv-ben:" . BR;
    echo '$p3 = ' . $p3 . BR;
    echo '$p4 = ' . $p4 . BR;
}

function fv3($p3, $p4 = 100)
{
    $p3++;
    $p4--;

    echo "A paraméterek értéke a fv-ben:" . BR;
    echo '$p3 = ' . $p3 . BR;
    echo '$p4 = ' . $p4 . BR;
}

$p1 = 10;
$p2 = 20;
echo SOR;
echo "Érték szerinti paraméter átadás" . BR;
echo "A paraméterek értéke a fv hívás előtt:" . BR;
echo '$p1 = ' . $p1 . BR;
echo '$p2 = ' . $p2 . BR;
fv1($p1, $p2);
echo "A paraméterek értéke a fv hívás után:" . BR;
echo '$p1 = ' . $p1 . BR;
echo '$p2 = ' . $p2 . BR;

echo SOR;
echo "Cím szerinti paraméter átadás" . BR;
echo "A paraméterek értéke a fv hívás előtt:" . BR;
echo '$p1 = ' . $p1 . BR;
echo '$p2 = ' . $p2 . BR;
fv2($p1, $p2);
echo "A paraméterek értéke a fv hívás után:" . BR;
echo '$p1 = ' . $p1 . BR;
echo '$p2 = ' . $p2 . BR;

echo SOR;
echo "Paraméter alapértelmezett értéke" . BR;
fv3(10);

echo SOR;
echo "Dinamikus fv hívás" . BR;
function fv5()
{
    echo "Én a fv5 vagyok" . BR;
}
function fv6()
{
    echo "Én a fv6 vagyok" . BR;
}

$f = "fv5";
$f();

$f = 'fv6';
$f();


echo SOR;
echo "Fv visszatérési értéke" . BR;

function fv7()
{
    return "Én a fv7 vagyok" . BR;
}

echo fv7();
