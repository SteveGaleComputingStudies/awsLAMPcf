<?php
// Insert form data into table MyGuests in myDB using prepared statement
// https://www.w3schools.com/php/php_mysql_prepared_statements.asp

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

// prepare and bind

$stmt = mysqli_prepare($conn, "INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sss", $firstname, $lastname, $email);

// set parameters and execute
$firstname = "John";
$lastname = "Doe";
$email = "john@example.com";
mysqli_stmt_execute($stmt);

$firstname = "Mary";
$lastname = "Moe";
$email = "mary@example.com";
mysqli_stmt_execute($stmt);

$firstname = "Julie";
$lastname = "Dooley";
$email = "julie@example.com";
mysqli_stmt_execute($stmt);

echo "New records created successfully";

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>