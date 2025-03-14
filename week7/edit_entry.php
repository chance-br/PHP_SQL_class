<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Edit a Blog Entry</title>
    </head>
    <body>
        <h1>Edit an Entry</h1>

        <?php
        $dbc = mysqli_connect('localhost', 'root', 'admin', 'myblog');
        mysqli_set_charset($dbc, 'utf8');

        ini_set('display_errors', 0);

        $get_id = $_GET['id'];
        $post_id = $_POST['id'];

        if (isset($get_id) && is_numeric($get_id)) {
            $query = "SELECT title, entry FROM entries WHERE id={$get_id}";

            if ($r = mysqli_query($dbc, $query)) {
                $row = mysqli_fetch_array($r);

                $title = $row['title'];
                $entry = $row['entry'];

                print '<form action="edit_entry.php" method="post"><p>Entry Title: <input type="text" name="title" size="40" maxsize="100" value="' . htmlentities($title) . '" /></p><p>Entry Text: <textarea name="entry" cols="40" rows="5">' . htmlentities($entry) . '</textarea></p><input type="hidden" name="id" value="' . $get_id . '"><input type="submit" name="submit" value="Update this Entry!"></form>';
            } else {
                print '<p style="color:red;">Could not retrieve the blog entry because:<br>' . mysqli_error($dbc) . '.</p></p>The query being run was: ' . $query . '</p>';
            }
        } elseif (isset($post_id) && is_numeric($post_id)) {
            $problem = false;

            $title = $_POST['title'];
            $entry = $_POST['entry'];

            if (!empty($title) && !empty($entry)) {
                $title = mysqli_real_escape_string($dbc, trim(strip_tags($title)));
                $entry = mysqli_real_escape_string($dbc, trim(strip_tags($entry)));
            } else {
                print '<p style="color:red;">Please submit both a title and an entry.</p>';
                $problem = true;
            }

            if (!$problem) {
                $query = "UPDATE entries SET title='$title', entry='$entry' WHERE id={$post_id}";
                $r = mysqli_query($dbc, $query);

                if (mysqli_affected_rows($dbc) == 1) {
                    print '<p>The blog entry has been updated.</p>';
                } else {
                    print '<p style="color:red;">Could not update the entry because:<br>' . mysqli_error($dbc) . '.</p></p>The query being run was: ' . $query . '</p>';
                }
            }
        } else {
            print '<p style="color:red;">This page has been accessed in error.</p>';
        }

        mysqli_close($dbc);
        ?>
    </body>