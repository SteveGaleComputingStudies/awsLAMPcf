<?php
// Create a database myDB
// https://www.w3schools.com/php/php_mysql_create.asp

$servername = "localhost";
$username = "username";
$password = "Password1";
$database = "";
$port = 3306;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database, $port);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE myDB";

if (mysqli_query($conn, $sql)) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>