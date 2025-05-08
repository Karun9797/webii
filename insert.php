<?php
include ("databaseconnection.php");

if (isset($_POST['submit'])) { //checks whether a variable is null or not
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
$sql = "INSERT into students(Name, Email, Phone) values ('$name','$email','$phone')";

try{
    mysqli_query($conn, $sql);
    echo"student is now registered";

}
catch(mysqli_sql_excpetion){
    echo " could not register";
}
}
mysqli_close($conn);

?>

    