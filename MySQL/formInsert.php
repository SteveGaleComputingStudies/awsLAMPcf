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

$sql="INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('$firstname', '$lastname', '$email')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);
  ?>