<?php
include("databaseconnection.php");

$new_username = "messis";  
$new_password = "ronaldos"; 

$sql = "UPDATE users 
        SET password = '$new_password' , user = '$new_username'
        WHERE id = '18'";

try {
    mysqli_query($conn, $sql);
    echo "User password updated successfully.";
} 
catch (mysqli_sql_exception $e) {
    echo "Could not update: " . $e->getMessage();
}

mysqli_close($conn);
?>

