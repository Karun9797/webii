<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
</head>
<body>
    
    <h1>Registration Form</h1>
    <p>Use tab keys to move from one input field to the next.</p>


    <?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
session_unset();
?>

<form action="validation.php" method="post">
    User ID:* <input type="text" name="userID" value="<?= $old['userID'] ?? '' ?>">
    <span style="color:red"><?= $errors['userID'] ?? '' ?></span><br>

    Password:* <input type="password" name="password">
    <span style="color:red"><?= $errors['password'] ?? '' ?></span><br>

    First Name:* <input type="text" name="firstName" value="<?= $old['firstName'] ?? '' ?>">
    <span style="color:red"><?= $errors['firstName'] ?? '' ?></span><br>

    Address:* <input type="text" name="address" value="<?= $old['address'] ?? '' ?>">
    <span style="color:red"><?= $errors['address'] ?? '' ?></span><br>

    Country:* 
    <select name="country">
        <option value="Nepal" <?= ($old['country'] ?? '') == 'Nepal' ? 'selected' : '' ?>>Nepal</option>
        <option value="India" <?= ($old['country'] ?? '') == 'India' ? 'selected' : '' ?>>India</option>
    </select><br>

    ZIP Code:* <input type="text" name="zip" value="<?= $old['zip'] ?? '' ?>">
    <span style="color:red"><?= $errors['zip'] ?? '' ?></span><br>

    Email:* <input type="text" name="email" value="<?= $old['email'] ?? '' ?>">
    <span style="color:red"><?= $errors['email'] ?? '' ?></span><br>

    Sex:* 
    <input type="radio" name="sex" value="male" <?= ($old['sex'] ?? '') == 'male' ? 'checked' : '' ?>> Male
    <input type="radio" name="sex" value="female" <?= ($old['sex'] ?? '') == 'female' ? 'checked' : '' ?>> Female<br>

    Language:* 
    <input type="checkbox" name="language[]" value="English" <?= in_array('English', $old['language'] ?? []) ? 'checked' : '' ?>> English
    <input type="checkbox" name="language[]" value="Non English" <?= in_array('Non English', $old['language'] ?? []) ? 'checked' : '' ?>> Non English<br>

    About: <textarea name="about" rows="5" cols="40"><?= $old['about'] ?? '' ?></textarea><br>

    <input type="submit" value="Submit">
</form>

<?php if (isset($_GET['success'])): ?>
<p style="color:green;">Form submitted successfully!</p>
<?php endif; ?>

   
</body>
</html>