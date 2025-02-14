<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Larry Ullman's Book and Chapters</title>
    </head>
    <body>
        <h1>Some of Larry Ullman's Books</h1>
        <?php
        $phpvqs = [1 => 'Getting Started with PHP', 'Variables', 'HTML Forms and PHP', 'Using Numbers'];
        $phpadv = [1 => 'Advanced PHP Techniques', 'Developing Web Applications', 'Advanced Database Concepts', 'Basic Object-Oriented Programming'];
        $phpmysql = [1 => 'Introduction to PHP', 'Programming with PHP', 'Creating Dynamic Web Sites', 'Introduction to MySQL'];

        $books = ['PHP VQS' => $phpvqs, 'PHP Advanced VQP' => $phpadv, 'PHP and MySQL VQP' => $phpmysql];

        print "<p>The third chapter of my first book is <i>{$books['PHP VQS'][3]}</i>.</p>";
        print "<p>The first chapter of my second book is <i>{$books['PHP Advanced VQP'][1]}</i>.</p>";
        print "<p>The fourth chapter of my fourth book is <i>{$books['PHP and MySQL VQP'][4]}</i>.</p>";

        foreach ($books as $key => $value) {
            $str = '';
            foreach ($value as $v) {
                $str .= $v . ', ';
            }
            print "<p>$key: $str</p>\n";
        }
        ?>
    </body>