<?php
$servername = "localhost";
$username = "demouser";
$password = null;
$dbname = "db_demo";
$conn=mysqli_connect($servername, $username, $password, $dbname);
if($conn -> connect_error)
		die("Connection error!". $conn->connect_error);
else
echo "Successful connect to MySQL ";

$sql="CREATE TABLE Account(ID INT UNIQUE , USERNAME VARCHAR(30) UNIQUE ,PASSWORD CHAR(30))";
if ($conn->query($sql) === TRUE) {
	  echo "Database created successfully";
	} else {
	  echo "Error creating database: " . $conn->error;
	}
$conn=mysqli_connect($servername, $username, $password,$dbname);
	if ($conn->query($sql) === TRUE) {
	  echo "</br>Table build successfully </br>";
	} else {
	  echo "</br>Error: " . $conn->error;
	}
mysqli_close($conn);
?>