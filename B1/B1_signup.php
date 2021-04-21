<!DOCTYPE html>
<html>
<head>
	<title>
		Sign up
	</title>
</head>
<body>
	<form method="post">
		<h3>SIGN UP</h3>
		USERNAME: <input type="text" name="username"></br>
		PASSWORD: <input type="password" name="password"></br>
		<input type="submit" name="dowhat" value="Sign up"/> </br>
	</form>
	<a href = "B1_login.php"> Return to Log in </a> </br>	
</body>
</html>

<?php
	session_start();
	include("conn.php");
	include("function.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$name = $_POST['username'];
		$pass = $_POST['password'];
		if(!empty($name) && !empty($pass) && !is_numeric($name))
		{
			$id = random_num(8);
			$sql = "INSERT INTO account (ID, USERNAME, PASSWORD) VALUES ('$id','$name','$pass')"; 
			mysqli_query($conn, $sql);
			echo "Sign up successfully";
			die();
		}
		else
		{
			echo 'Sign up failed. Please sign up again.';
		}
	}

?>