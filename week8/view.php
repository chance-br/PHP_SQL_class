<?php
# Set the window title and include the header
define('TITLE', 'View / Edit an Application');
include('templates/header.html');
?>

<h3>View / Edit an Application</h3>
<p>Enter and submit your email to view your application.</p>

<!-- Create the form -->
<form action="view.php" method="post" class="form--inline">
    <p>Email Address: <input type="email" name="email" size="20" placeholder="johndoe@example.com" required></p>
    <input type="submit" name="submit" value="Submit">
</form>

<?php

# Strips all unnecessary characters in the string (allows it to be passed on to the database)
function complete_strip($dbc, $text) {
    return mysqli_real_escape_string($dbc, trim(strip_tags($text)));
}

# Check if the method is post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Connect to mysql
    if ($dbc = @mysqli_connect('localhost', 'root', 'admin')) {
        $email = complete_strip($dbc, $_POST['email']);

        # Selects the database
        $query = 'USE c_trial';
        @mysqli_query($dbc, $query);

        # Checks if the email submit is equal to one in the database
        $query = "SELECT * FROM applications WHERE email='$email'";
        $result = mysqli_query($dbc, $query);

        # If the emails match up, show the application data
        if ($result && mysqli_num_rows($result) > 0) {
            # Retrieves the row as an array
            $row = mysqli_fetch_assoc($result);

            print '<h3>Your Application:</h3>';

            # Loops through the array
            foreach ($row as $key => $value) {
                # Does not print the id or date entered
                if ($key == 'id' || $key == 'date_entered'){continue;}

                print "<p><strong>$key:</strong> $value</p>";
            }
            print "<p><a href=\"edit.php?id={$row['id']}\">Edit</a> &nbsp;&nbsp; <a href=\"delete.php?id={$row['id']}\">Delete</a></p>";
        } elseif ($result) {
            # Prints if the application isn't in the database
            print '<p style="color:red;">Your application could not be found.</p>';
        } else {
            print '<p style="color:red;">Could not retrieve the data because:<br>' . mysqli_error($dbc) . '.</p> </p>The query being run was: ' . $query . '</p>';
        }

        mysqli_close($dbc);
    }
}

# Include the footer
include('templates/footer.html');
?>