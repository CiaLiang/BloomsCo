<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$con = mysqli_connect('localhost','root','','sneakervault');
if(!$con){
    die(mysqli_error($con));
}