<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Delete a Blog Entry</title>
    </head>
    <body>
        <h1>Delete an Entry</h1>

        <?php
        $dbc = mysqli_connect('localhost', 'root', 'admin', 'myblog');

        ini_set('display_errors', 0);

        $id = $_GET['id'];
        $post_id = $_POST['id'];

        if (isset($id) && is_numeric($id)) {
            $query = "SELECT title, entry FROM entries WHERE id={$id}";

            if ($r = mysqli_query($dbc, $query)) {
                $row = mysqli_fetch_array($r);

                $title = $row['title'];
                $entry = $row['entry'];

                print '<form action="delete_entry.php" method="post"><p>Are you sure you want to delete this entry?</p><p><h3>' . $title . '</h3>' . $entry . '<br><input type="hidden" name="id" value="' . $id . '"><input type="submit" name="submit" value="Delete this Entry!"></p></form>';
            } else {
                print '<p style="color:red;">Could not retrieve the blog entry because:<br>' . mysqli_error($dbc) . '.</p></p>The query being run was: ' . $query . '</p>';
            }
        } elseif (isset($post_id) && is_numeric($post_id)) {
            $query = "DELETE FROM entries WHERE id={$post_id} LIMIT 1";

            $r = mysqli_query($dbc, $query);
            if (mysqli_affected_rows($dbc) == 1) {
                print '<p>The blog entry has been deleted.</p>';
            } else {
                print '<p style="color:red;">Could not delete the blog entry because:<br>' . mysqli_error($dbc) . '.</p></p>The query being run was: ' . $query . '</p>';
            }
        } else {
            print '<p style="color:red;">This page has been accessed in error.</p>';
        }

        mysqli_close($dbc);
        ?>
    </body>