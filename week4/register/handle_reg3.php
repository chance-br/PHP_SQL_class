<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Registration</title>
    </head>
    <body>
        <h1>Registration Results</h1>

        <?php
        error_reporting(0);

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        $year = $_POST['year'];
        $color = $_POST['color'];
        $terms = $_POST['terms'];

        $okay = true;

        if (empty($email) || empty($password) || empty($confirm) || !is_numeric($year) || !is_set($terms)) {
            print "<p>One or more fields are empty.</p>";
            $okay = false;
        }

        if (is_numeric($year)) {
            $age = 2025 - $year;
            print "You will turn $age this year.";
        } else {
           print "<p>Please enter the year you were born as four digits.</p>";
           $okay = false;
        }

        if ($okay) {
            print '<p>You have been successfully registered.</p>';
        } else {
            print '<p>Registration Unsuccessful.</p>';
        }
        ?>
    </body>