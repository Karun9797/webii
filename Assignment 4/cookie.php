<?php

    // a: Create a cookie with username and college roll number
    $username = "Karun Sunuwar";
    $rollNumber = 11;

    // cookie expires after 3 days
    $expiry = time() + (3 * 24 * 60 * 60);

    // Sets cookie
    setcookie("userInfo", json_encode(["username" => $username, "rollNumber" => $rollNumber]), $expiry);

    // Checks if the cookie is present and display email if username is entered
    if (isset($_COOKIE['userInfo'])) {
        
        $cookieData = json_decode($_COOKIE['userInfo'], true);
        echo "Cookie is present.<br>";
        echo "Your roll number is: " . $cookieData['rollNumber'] . "<br>";

        // email given by the cookie
        if (isset($_POST['username']) && $_POST['username'] === $cookieData['username']) {
            echo "Your email is: karunkarun9797@gmail.com";
        }
    } else {
        echo "Cookie is not present.";
    }

    // b: operations to be perform

    // i. Checks if cookies are enabled
    if (count($_COOKIE) > 0) {
        echo "Cookies are enabled.";
    } else {
        echo "Cookies are not enabled.";
    }

    // ii. Delete the created cookie an hour before
    if (isset($_COOKIE['userInfo'])) {
        $past = time() - 3600;
        setcookie('userInfo', '', $past);
        echo "Cookie 'userInfo' deleted.";
    } else {
        echo "Cookie 'userInfo' not found.";
    }
    ?>

<!DOCTYPE html>
<html>

<head>
    <title>Session and Cookie</title>
</head>

<body>
    <form method="POST">
        Enter your username: <input type="text" name="username">
        <input type="submit" value="Submit">
    </form>
</body>

</html>