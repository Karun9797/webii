<?php
require('connection.php');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['add'])) {
    $firstname = $_POST['firstname'];
    $designation = $_POST['designation'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $email = $_POST['email'];

    $sql = "INSERT INTO contacts (firstname, designation, address1, address2, city, state, email) 
            VALUES ('$firstname', '$designation', '$address1', '$address2', '$city', '$state', '$email')";
    mysqli_query($conn, $sql);
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM contacts WHERE id=$id");
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $designation = $_POST['designation'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $email = $_POST['email'];

    $sql = "UPDATE contacts SET 
            firstname='$firstname', designation='$designation', address1='$address1',
            address2='$address2', city='$city', state='$state', email='$email'
            WHERE id=$id";
    mysqli_query($conn, $sql);
}

$contacts = mysqli_query($conn, "SELECT * FROM contacts");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Address Book</title>
</head>

<body>
    <h2>Address Book</h2>

    <form method="POST">
        <input type="hidden" name="id" value="">
        First Name: <input type="text" name="firstname" required><br>
        Designation: <input type="text" name="designation"><br>
        Address 1: <input type="text" name="address1"><br>
        Address 2: <input type="text" name="address2"><br>
        City: <input type="text" name="city"><br>
        State: <input type="text" name="state"><br>
        Email: <input type="email" name="email" required><br>
        <button type="submit" name="add">Add Contact</button>
    </form>

    <hr>

    <table border="1">
        <tr>
            <th>First Name</th>
            <th>Designation</th>
            <th>Address 1</th>
            <th>Address 2</th>
            <th>City</th>
            <th>State</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($contacts)): ?>
        <tr>
            <td><?= $row['firstname'] ?></td>
            <td><?= $row['designation'] ?></td>
            <td><?= $row['address1'] ?></td>
            <td><?= $row['address2'] ?></td>
            <td><?= $row['city'] ?></td>
            <td><?= $row['state'] ?></td>
            <td><?= $row['email'] ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button name="delete" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <hr>

    <h3>Search Contact by Email</h3>
    <form method="GET" action="search.php">
        <input type="email" name="email" required>
        <button type="submit">Search</button>
    </form>
</body>

</html>