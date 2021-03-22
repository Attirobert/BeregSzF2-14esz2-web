<?php
$params = (count(($_GET) ? $_GET : $_POST));
print "Üdvözlet " . $params["user"] . "<br>";
print "Az Ön címe: " . $params["cim"] . "<br>";

print "A következő termékeket választotta:<br>";
print "<ul>";
$par[] = $params["termekek"];
foreach ($par as $pr => $termek)
    print "<li>$pr ==> $termek</li>";
print "</ul><br>";
