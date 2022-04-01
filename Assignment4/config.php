<?php

$server = "localhost";
$user = "root";
$pass = "";

$conn = mysqli_connect($server, $user, $pass);

if (!$conn) {
    die("<script>alert('Failed to connect to server')</script>");
}

// Create database
$db_selected = $conn->select_db('myDB');
$exists = false;
if (!$db_selected) {
    $sql = "CREATE DATABASE myDB";
    if ($conn->query($sql) === TRUE) {
        // echo "Database created successfully";
    } else {
        //  echo "Error creating database: " . $conn->error;
    }
    $exists = true;
}
$conn->close();

$server = "localhost";
$user = "root";
$pass = "";
$db = "myDB";

$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn) {
    die("<script>alert('Failed to connect to server')</script>");
}
if ($exists) {
    // sql to create FuelQuote Table
    $sql = "CREATE TABLE FuelQuote (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    gallonsRequested BIGINT NOT NULL,
    deliveryAddress VARCHAR(100) NOT NULL,
    deliveryDate DATE NOT NULL,
    dollarsPerGallon DOUBLE(255, 2) UNSIGNED  NOT NULL,
    totalDue DOUBLE(255, 2) UNSIGNED  NOT NULL
    )";
    if ($conn->query($sql) === TRUE) {
        //echo "Table created successfully";
    } else {
        //echo "Error creating table: " . $conn->error;
    }

    // sql to create UserProfile Table
    $sql = "CREATE TABLE UserProfile (
    UserName VARCHAR(30) NOT NULL,
    FName VARCHAR(50) NOT NULL,
    LName VARCHAR(50) NOT NULL,
    Add1 VARCHAR(100) NOT NULL,
    Add2 VARCHAR(100),
    City VARCHAR(100) NOT NULL,
    StateCode CHAR(2) NOT NULL,
    Zip VARCHAR(9) NOT NULL
    )";
    if ($conn->query($sql) === TRUE) {
        //echo "Table created successfully";
    } else {
        //echo "Error creating table: " . $conn->error;
    }

    // sql to create Users Table (usernames, passwords, bool new user)
    $sql = "CREATE TABLE users (
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    new TINYINT(1) NOT NULL
    )";
    if ($conn->query($sql) === TRUE) {
        //echo "Table created successfully";
    } else {
        //echo "Error creating table: " . $conn->error;
    }
}

$conn->close();