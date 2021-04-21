<?php

	$servername = "localhost";
	$username = "demouser";
	$password = null;
	$dbname = "db_demo";
	
	if(!$conn = mysqli_connect($servername, $username, $password, $dbname))
	{
			die("Connection error!");
	}
