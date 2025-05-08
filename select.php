<?php
include("databaseconnection.php");

$new_username = "messis";  
$new_password = "ronaldos"; 

// $sql = "SELECT id, user FROM users";
// $sql = "SELECT id, user FROM users WHERE id > 5";
// $sql = "SELECT * FROM users ORDERBY id DESC";
$sql = "SELECT * FROM users Limit 5";
$result = mysqli_query($conn, $sql);

if(mysqli_fetch_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "id: " . $row["id"]. " - Name: " . $row["user"] . "<br>";
    }
}
else{
    echo "0 results";
}

mysqli_close($conn);
?>

