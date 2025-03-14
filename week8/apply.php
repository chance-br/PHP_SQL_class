<?php
# Set the window title and include the header
define('TITLE', 'Submit an Application');
include('templates/header.html');
?>

<h3>Submit an Application</h3>
<p>To apply, please fill out the required information in the fields below. Once completed, click "Submit" to send in your application.</p>

<?php

# Strips all unnecessary characters in the string (allows it to be passed on to the database)
function complete_strip($dbc, $text) {
    return mysqli_real_escape_string($dbc, trim(strip_tags($text)));
}

# Check if the method is post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Connect to mysql
    if ($dbc = @mysqli_connect('localhost', 'root', 'admin')) {
        # Define all variable data
        
        $first_name = complete_strip($dbc, $_POST['first_name']);
        $last_name = complete_strip($dbc, $_POST['last_name']);
        $address = complete_strip($dbc, $_POST['address']);
        $city = complete_strip($dbc, $_POST['city']);
        $state = complete_strip($dbc, $_POST['state']);
        $phone_number = complete_strip($dbc, $_POST['phone_number']);
        $email = complete_strip($dbc, $_POST['email']);
        $conditions = complete_strip($dbc, $_POST['conditions']);

        # Selects the database
        $query = 'USE c_trial';
        @mysqli_query($dbc, $query);

        # Inserts the submitted values into the database's application table
        $query = "INSERT INTO applications (id, first_name, last_name, address, city, state, phone_number, email, conditions, date_entered) VALUES (0, '$first_name', '$last_name', '$address', '$city', '$state', '$phone_number', '$email', '$conditions', NOW())";
        if (@mysqli_query($dbc, $query)) {
            # Prints a success message and allows you to view the application
            print '<p>Your application has been submit. Click <a href="view.php">here</a> to view it!</p>';
        } else {
            # This error shouldn't happen, but if it does: show the error
            print '<p style="color:red;">Your application could not be submit: error<br>' . mysqli_connect_error() . '. Please refresh the page.</p>';
        }

        mysqli_close($dbc);
    } else {
        print '<p style="color:red;">Could not connect MySQL:<br>' . mysqli_connect_error() . '.</p>';
    }
} else {
    # Prints the form if a post request hasn't happened
    print '<!-- Create the form -->
    <form action="apply.php" method="post" class="form--inline">
        <p>First Name: <input type="text" name="first_name" size="20" placeholder="John" required></p>
        <p>Last Name: <input type="text" name="last_name" size="20" placeholder="Doe" required></p>
        <p>Address: <input type="text" name="address" size="40" placeholder="1234 N Example Ln" required></p>
        <p>City: <input type="text" name="city" size="20" required></p>
        <p>State: <input type="text" name="state" size="10" placeholder="NY" required></p>
        <p>Phone Number: <input type="text" name="phone_number" size="20" placeholder="1-123-456-7890" required></p>
        <p>Email Address: <input type="email" name="email" size="20" placeholder="johndoe@example.com" required></p>
        <p>Diagnosed Health Conditions: <textarea name="conditions" cols="40" rows="3"></textarea></p>
        <input type="submit" name="submit" value="Submit">
    </form>';
}

# Include the footer
include('templates/footer.html');
?>