<?php
// Establish a database connection to AWS RDS
$host = "bloomsco.cgas1ms7nugm.us-east-1.rds.amazonaws.com";
$username = "blooms";
$password = "bloomsCo123";
$db_name = "bloomsCo";

$con = mysqli_connect($host, $username, $password, $db_name);
if (!$con) {
    die(mysqli_error($con));
}
?>
