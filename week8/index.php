<?php
include('templates/header.html');

# This wouldn't be used on a professional server, this is here just so you can run it with no problems! :)
if ($dbc = @mysqli_connect('localhost', 'root', 'admin')) {
    # Creates a database if it doesn't exist
    $query = 'CREATE DATABASE IF NOT EXISTS c_trial DEFAULT CHARACTER SET utf8';
    @mysqli_query($dbc, $query);

    # Selects the database
    $query = 'USE c_trial';
    @mysqli_query($dbc, $query);

    # Creates a table if it doesn't exist
    $query = 'CREATE TABLE IF NOT EXISTS applications (id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, first_name TEXT NOT NULL, last_name TEXT NOT NULL, address CHAR(2) NOT NULL, city TEXT NOT NULL, state TEXT NOT NULL, phone_number VARCHAR(15) NOT NULL, email TEXT NOT NULL, conditions VARCHAR(500) NOT NULL, date_entered DATETIME NOT NULL) DEFAULT CHARACTER SET utf8';
    @mysqli_query($dbc, $query);

    mysqli_close($dbc);
}
?>

<h3>Explore the Opportunity to Participate in a Clinical Trial!</h3>
<p>At Medical Institution, we are dedicated to advancing medical research and discovering innovative treatments for a wide range of diseases. By participating in a clinical trial, you play a vital role in helping us explore new therapies, improve existing treatments, and contribute to the future of healthcare.</p>
<p>Click <a href="apply.php">here</a> to submit an application!</p>

<?php
include('templates/footer.html');
?>