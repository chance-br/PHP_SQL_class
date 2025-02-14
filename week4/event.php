<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Add an Event</title>
    </head>
    <body>
        <?php
        $name = $_POST['name'];
        $days = $_POST['days'];

        print "<p>You want to add an event called <b>$name</b> which takes place on: <br>";
        if (isset($days) && is_array($days)) {
            foreach ($days as $day) {
                print "$day<br>\n";
            }
        } else {
            print 'Please select at least one weekday for this event!';
        }
        ?>
    </body>