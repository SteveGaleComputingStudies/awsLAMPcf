<html>
    <Body>
    <table>
<?php
// Insert form data into table MyGuests in myDB using prepared statement
// https://www.w3schools.com/php/php_mysql_prepared_statements.asp
# https://www.php.net/manual/en/mysqli-stmt.prepare.php

$servername = "localhost";
$username = "username";
$password = "Password1";
$dbname = "myDB";
$port = 3306;


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = "John";
$stmt = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmt, 'SELECT * FROM MyGuests WHERE Firstname=?')) {

    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "s", $name);      //https://www.php.net/manual/en/mysqli-stmt.bind-param.php
    
    /* execute query */
    mysqli_stmt_execute($stmt);

    echo "<tr><th>Email</th><th>firstname</th><th>lastname</th></tr>";  

    $result = mysqli_stmt_get_result($stmt);

  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>". $row["email"]. "</td><td>" . $row["firstname"]. "</td><td> " . $row["lastname"]. "</td></tr>";  
  }

    /* close statement */
    mysqli_stmt_close($stmt);
}

/* close connection */
mysqli_close($conn);
?>

</table>
</body>
</html>
