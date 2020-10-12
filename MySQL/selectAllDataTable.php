
<html>
    <Body>
    <table>
<?php
// Display data into table MyGuests in myDB
// https://www.w3schools.com/php/php_mysql_select.asp


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

$sql = "SELECT * FROM MyGuests";
$result = mysqli_query($conn, $sql);

echo "<tr><th>Email</th><th>firstname</th><th>lastname</th></tr>";  
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
//    echo "Email: " . $row["email"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    echo "<tr><td>". $row["email"]. "</td><td>" . $row["firstname"]. "</td><td> " . $row["lastname"]. "</td></tr>";  
  }
} else {
  echo "0 results";
}

mysqli_close($conn);

?>
</table>
</body>
</html>