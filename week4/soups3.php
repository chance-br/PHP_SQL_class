<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Soup</title>
    </head>
    <body>
        <?php
        $soups = ['Monday' => 'Clam Chowder', 'Tuesday' => 'White Chicken Chili', 'Wednesday' => 'Vegetarian', 'Thursday' => 'Minestrone', 'Friday' => 'Tomato Basil', 'Saturday' => 'Chicken Noodle', 'Sunday' => 'Beef Stew'];

        foreach ($soups as $day => $soup) {
            print "<p>$day: $soup</p>\n";
        }
        ?>
    </body>