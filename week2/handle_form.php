<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Your Feedback</title>
    </head>
    <body>
        <?php
        ini_set('display_errors', 1);

        $title = $_POST['title'];
        $last_name = $_POST['last_name'];
        $response = $_POST['response'];
        $comments = $_POST['comments'];

        print "<p>Thank you, $title $last_name for your comments.</p><p>You stated that you found this example to be '$response' and added:<br>$comments</p>"
        ?>
    </body>