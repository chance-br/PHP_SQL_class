<?php
# Set the window title and include the header
define('TITLE', 'Delete an Application');
include('templates/header.html');
?>

<h3>Delete an Application</h3>
<p>Would you like to delete your application?</p>

<?php

# Strips all unnecessary characters in the string (allows it to be passed on to the database)
function complete_strip($dbc, $text) {
    return mysqli_real_escape_string($dbc, trim(strip_tags($text)));
}

# Set so that post_id / get_id being null wont produce an error
ini_set('display_errors', 0);

$get_id = $_GET['id'];
$post_id = $_POST['id'];

if ($dbc = @mysqli_connect('localhost', 'root', 'admin')) {
    # Checks if get id is set and is numeric
    if (isset($get_id) && is_numeric($get_id)) {
        # Prints the submit buttons
        print '<form action="delete.php" method="post">
        <input type="submit" name="submit" value="Delete My Application">
        <input type="hidden" name="id" value="' . $get_id . '">
        </form>

        <form action="index.php" method="post">
        <input type="submit" name="submit" value="Return to Homepage">
        </form>';
    # Checks if post id is set and is numeric
    } elseif (isset($post_id) && is_numeric($post_id)) {
        # Selects database
        $query = 'USE c_trial';
        @mysqli_query($dbc, $query);

        # Deletes the data found in applications with the matching id
        $query = "DELETE FROM applications WHERE id={$post_id} LIMIT 1";
        $result = mysqli_query($dbc, $query);

        if (mysqli_affected_rows($dbc) == 1) {
            print '<p>Your application has been deleted. Click <a href="index.php">here</a> to return to the homepage.</p>';
        } else {
            print '<p style="color:red;">Could not delete the application, please try again.</p>';
        }
    }
    mysqli_close($dbc);
}

# Include the footer
include('templates/footer.html');
?>