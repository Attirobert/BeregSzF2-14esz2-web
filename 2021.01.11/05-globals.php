<?php
$user1 = "Judit";
$user2 = "István";
$user3 = "Rebeka";

foreach ($GLOBALS as $kulcs => $ertek) {
    if (gettype($ertek) == "array") {
        print "$kulcs == <br>";
        foreach ($ertek as $tombelem) {
            if (gettype($tombelem) != "array") print ".................. $tombelem<br>";
        }
    } else print "\$GLOBALS[\"$kulcs\"] == $ertek<br>";
}

print "HTTP_USER_AGENT: " . $_SERVER["HTTP_USER_AGENT"] . "<br>";
print "PHP_SELF: " . $_SERVER["PHP_SELF"] . "<br>";
print "REMOTE_ADDR: " . $_SERVER["REMOTE_ADDR"] . "<br>";
print "QUERY_STRING: ";
print $_SERVER["QUERY_STRING"] . "<br>";
print "REQUEST_URI: ";
print $_SERVER["REQUEST_URI"] . "<br>";
