<?php
// Establish a database connection
$host = "localhost";
$username = "root";
$password = "";
$db_name = "sneakervault";

$con = mysqli_connect($host, $username, $password, $db_name);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>