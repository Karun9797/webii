<?php
require('connection.php');


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $sql = "SELECT * FROM contacts WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        echo "<h2>Contact Details</h2>";
        echo "First Name: " . $row['firstname'] . "<br>";
        echo "Designation: " . $row['designation'] . "<br>";
        echo "Address 1: " . $row['address1'] . "<br>";
        echo "Address 2: " . $row['address2'] . "<br>";
        echo "City: " . $row['city'] . "<br>";
        echo "State: " . $row['state'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
    } else {
        echo "No contact found with email: $email";
    }
} else {
    echo "Email parameter is missing.";
}
?>