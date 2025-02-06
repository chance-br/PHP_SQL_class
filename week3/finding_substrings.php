<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Finding Substrings</title>
    </head>
    <body>
        <?php
        // ex 1: substr
        print "ex 1: substr<br>";

        echo substr("Chance Breazier", 0, 6); // Gets the first 6 letters starting from 0 index
       
        print "<br>";

        echo substr("Chance Breazier", -8, 8); // Gets 8 letters starting from -8 index (reverse index order)

        // ex 2: strstr
        print "<br><br>ex 2: strstr<br>";

        echo strstr("Chance Breazier", "Breazier"); // Finds 2nd param ("Breazier") in the first param ("Chance Breazier")
        // aka "Finding the needle in a haystack" -- this function is case sensitive

        print "<br>";

        echo strstr("Chance Breazier", "breazier"); // Example of case sensitivity, this wont print anything

        // ex 3: strlen
        print "<br><br>ex 3: strlen<br>";

        echo strlen("Chance Breazier"); // This returns the length of the string
        ?>
    </body>