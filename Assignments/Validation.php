<?php
session_start();

$errors = [];
$old = $_POST;

$patterns = [
    'userID' => '/^.{5,12}$/',
    'password' => '/^.{7,12}$/',
    'firstName' => '/^[A-Za-z]+$/',
    'address' => '/^[A-Za-z0-9 ]+$/',
    'zip' => '/^\d+$/',
    'email' => '/^[\w\.-]+@[\w\.-]+\.[A-Za-z]{2,6}$/'
];

if (!preg_match($patterns['userID'], $_POST['userID'])) {
    $errors['userID'] = "User ID must be 5-12 characters.";
}

if (!preg_match($patterns['password'], $_POST['password'])) {
    $errors['password'] = "Password must be 7-12 characters.";
}

if (!preg_match($patterns['firstName'], $_POST['firstName'])) {
    $errors['firstName'] = "First Name must contain only letters.";
}

if (!preg_match($patterns['address'], $_POST['address'])) {
    $errors['address'] = "Address must be alphanumeric.";
}

if (!preg_match($patterns['zip'], $_POST['zip'])) {
    $errors['zip'] = "ZIP Code must be numeric.";
}

if (!preg_match($patterns['email'], $_POST['email'])) {
    $errors['email'] = "Invalid email format.";
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $old;
    header("Location: FormValidation.php");
    exit();
} else {

    header("Location: FormValidation.php?success=1");
    exit();
}