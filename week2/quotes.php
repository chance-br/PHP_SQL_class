<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Quotes</title>
    </head>
    <body>
        <pre>
            <?php
            $first_name = 'Chance';
            $last_name = "Breazier";

            $name1 = '$first_name $last_name';
            $name2 = "$first_name $last_name";

            print "<h1>Double Quotes</h1><p>name1 is $name1<br>name2 is $name2</p>";

            print '<h1>Single Quotes</h1><p>name1 is $name1<br>name2 is $name2</p>';
            ?>
        </pre>
    </body>