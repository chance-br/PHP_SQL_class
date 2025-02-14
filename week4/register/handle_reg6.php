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

        if (empty($email) || empty($password) || empty($confirm) || !is_numeric($year)) {
            print "<p>One or more fields are empty.</p>";
            $okay = false;
        }

        //

        if ($password != $confirm) {
            print '<p class="error">Your confirmed password does not match the original password.</p>';
        }

        //

        if (is_numeric($year) && strlen($year) == 4) {
            if ($year < 2025) {
                $age = 2025 - $year;
            } else {
                print '<p class="error">Age does not meet the requirements.</p>';
                $okay = false;
            }
        } else {
            print '<p class="error">Please enter the year you were born as four digits.</p>';
            $okay = false;
        }

        //

        if (!isset($terms) && $terms != "Yes") {
            print '<p class="error">You must accept the terms.</p>';
            $okay = false;
        }

        //

        $color_type = 'none';
        if ($color == 'red') {
            $color_type = 'primary';
        } elseif ($color == 'yellow') {
            $color_type = 'primary';
        } elseif ($color == 'green') {
            $color_type = 'secondary';
        } elseif ($color == 'blue') {
            $color_type = 'primary';
        } else {
            print '<p class="error">Please select your favorite color.</p>';
            $okay = false;
        }

        // main check

        if ($okay) {
            print '<p>You have been successfully registered.</p>';
            print "<p>Your favorite color is a $color_type color.</p>";
        } else {
            print '<p>Registration Unsuccessful.</p>';
        }
        ?>
    </body>