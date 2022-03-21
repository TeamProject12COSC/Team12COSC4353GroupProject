<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "userlogins";

$conn = mysqli_connect($server, $user, $pass, $db);

if(!$conn){
    die("<script>alert('Failed to connect to server')</script>");
}

?>