
<?php

$db_server = "localhost";
$db_user = "root";
$db_password = ""; 
$db_name = "PHPClass"; //add your database name
$conn = "";

try{
    $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);


}
catch(mysql_sql_exception){
    echo"could not connect" ;
}
if($conn){
    echo "you are connected :";

}

else{
    echo "Error on connection";

}
?>

