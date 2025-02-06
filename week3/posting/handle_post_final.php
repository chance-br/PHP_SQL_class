<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Forum Posting</title>
    </head>
    <body>
        <?php
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $posting = trim(nl2br($_POST['posting'], false));

        $name = $first_name . " " . $last_name;

        $words = str_word_count($posting);
        $posting =  str_replace('badword', 'XXXXX', $posting);

        print "<div>Thank you, $name, for your posting: <p>$posting</p><p>($words words)</p></div>";
        ?>
    </body>