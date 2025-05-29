<?php
    $to = "sunuwarmira12@gmail.com";
    $subject = "Test Email via msmtp";
    $message = "This email is sent without PHP Mailer.";
    $headers = "From: karunkarun9797@gmail.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
?>


<!DOCTYPE html>
<html>

<head>
    <title>PHP Mail Example</title>
</head>

<body>
    <h2>Enter Mailing Address:</h2>
    <form method="POST" action="">
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Message: <br>
        <textarea name="message" rows="5" cols="40" required></textarea><br><br>
        <input type="submit" value="Send">
    </form>
</body>

</html>