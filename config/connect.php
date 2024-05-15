<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
$dsn = 'mysql:host=bloomsco.cgas1ms7nugm.us-east-1.rds.amazonaws.com;port=3306;dbname=bloomsCo';
$username = 'bloomsCo';
$password = 'bloomsCo';

$dbh = new PDO($dsn, $username, $password);
if(!$con){
    die(mysqli_error($con));
}
