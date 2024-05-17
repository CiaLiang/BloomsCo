<?php

$dsn = 'mysql:host=bloomsco.cgas1ms7nugm.us-east-1.rds.amazonaws.com;dbname=bloomsCo';
$username = 'blooms';
$password = 'bloomsCo123';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

?>
