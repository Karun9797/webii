<?php
// Show all errors (for debugging)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'karunkarun9797@gmail.com';             // Your Gmail address
        $mail->Password   = 'dtgd aknr kdrv ckcr';               // Use app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           // Enable implicit TLS encryption
        $mail->Port       = 465;                                    // TCP port

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('karunkarun9797@gmail.com', 'Receiver');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Message from Contact Form';
        $mail->Body    = 'You have received a new message from <strong>' . htmlspecialchars($name) . '</strong><br><br>' .
                         'Email: ' . htmlspecialchars($email) . '<br><br>' .
                         'Message:<br>' . nl2br(htmlspecialchars($message));

        $mail->send();
        echo '<p style="color:green;">Message has been sent successfully!</p>';
    } catch (Exception $e) {
        echo '<p style="color:red;">Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '</p>';
    }
}
?>

<!-- HTML Form (for testing in browser) -->
<?php if ($_SERVER['REQUEST_METHOD'] != 'POST') { ?>
    <h2>Send a Test Email</h2>
    <form method="post" action="">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Message:</label><br>
        <textarea name="message" rows="5" required></textarea><br><br>

        <button type="submit">Send Email</button>
    </form>
<?php } ?>