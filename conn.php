<?php
$hostname = "localhost";
$username = "root";
$pass = "";
$name = "scolarite";

$conn = mysqli_connect($hostname ,$username ,$pass ,$name);
// check if connection...
if(!$conn){
    exit;
}