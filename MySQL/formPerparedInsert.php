<?php
// Insert form data into table MyGuests in myDB
$servername = "localhost";
$username = "username";
$password = "Password1";
$dbname = "myDB";
$port = 3306;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// escape variables for security - https://www.php.net/manual/en/mysqli.real-escape-string.php

$firstname = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['firstname']));
$lastname = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['lastname']));
$email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email']));


$stmt = mysqli_prepare($conn, "INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sss", $firstname, $lastname, $email);
mysqli_stmt_execute($stmt);

echo "New records created successfully";

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>