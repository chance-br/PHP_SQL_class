<?php
# Set the window title and include the header
define('TITLE', 'Edit an Application');
include('templates/header.html');
?>

<h3>Edit an Application</h3>
<p>Enter and submit the new application data.</p>

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
        # Prints a form with a hidden id
        print '<!-- Create the form -->
        <form action="edit.php" method="post" class="form--inline">
            <p>First Name: <input type="text" name="first_name" size="20" placeholder="John" required></p>
            <p>Last Name: <input type="text" name="last_name" size="20" placeholder="Doe" required></p>
            <p>Address: <input type="text" name="address" size="40" placeholder="1234 N Example Ln" required></p>
            <p>City: <input type="text" name="city" size="20" required></p>
            <p>State: <input type="text" name="state" size="10" placeholder="NY" required></p>
            <p>Phone Number: <input type="text" name="phone_number" size="20" placeholder="1-123-456-7890" required></p>
            <p>Email Address: <input type="email" name="email" size="20" placeholder="johndoe@example.com" required></p>
            <p>Diagnosed Health Conditions: <textarea name="conditions" cols="40" rows="3"></textarea></p>
            <input type="hidden" name="id" value="' . $get_id . '">
            <input type="submit" name="submit" value="Submit">
        </form>';
    # Checks if post id is set and is numeric
    } elseif (isset($post_id) && is_numeric($post_id)) {
        # Selects database
        $query = 'USE c_trial';
        @mysqli_query($dbc, $query);

        # Assigns post info to varialbes
        $first_name = complete_strip($dbc, $_POST['first_name']);
        $last_name = complete_strip($dbc, $_POST['last_name']);
        $address = complete_strip($dbc, $_POST['address']);
        $city = complete_strip($dbc, $_POST['city']);
        $state = complete_strip($dbc, $_POST['state']);
        $phone_number = complete_strip($dbc, $_POST['phone_number']);
        $email = complete_strip($dbc, $_POST['email']);
        $conditions = complete_strip($dbc, $_POST['conditions']);

        # Makes a query to update the data
        $query = "UPDATE applications SET first_name='$first_name', last_name='$last_name', address='$address', city='$city', state='$state', phone_number='$phone_number', email='$email', conditions='$conditions' WHERE id={$post_id}";
        $result = mysqli_query($dbc, $query);

        # Checks if the data was updated and prints accordingly
        if (mysqli_affected_rows($dbc) == 1) {
            print '<p>Your application has been updated. Click <a href="view.php">here</a> to view it!</p>';
        } else {
            print '<p style="color:red;">Could not update the application, please try again.</p>';
        }
    }
    mysqli_close($dbc);
}

# Include the footer
include('templates/footer.html');
?>