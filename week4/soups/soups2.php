<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Soup</title>
    </head>
    <body>
        <?php
        $soups = ['Monday' => 'Clam Chowder', 'Tuesday' => 'White Chicken Chili', 'Wednesday' => 'Vegetarian', 'Thursday' => 'Minestrone'];

        $count1 = count($soups);
        print "<p>The soups array originally had $count1 elements.</p>";
        
        $soups['Friday'] = 'Tomato Basil';
        $soups['Saturday'] = 'Chicken Noodle';
        $soups['Sunday'] = 'Beef Stew';

        $count2 = count($soups);
        print "<p>After adding 3 more soups, the array now has $count2 elements.</p>";
        
        ?>
    </body>