<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Forum Posting</title>
    </head>
    <body>
        <?php
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $posting = nl2br($_POST['posting'], false);

        $name = $first_name . " " . $last_name;

        print "<div>Thank you, $name, for your posting: <p>$posting</p></div>";
        ?>
    </body>