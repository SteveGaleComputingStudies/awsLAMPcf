<?php
// check if can connect to bd with username and password

$servername = "localhost";
$username = "username";
$password = "Password1";
$dbname = "";
$port = 3306;

// Create connection
$conn = mysqli_connect($servername, $username,$password, $database, $port); //, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    } else {
        echo "Connected succesfully to " . $dbname;
    }
mysqli_close($conn);
?>