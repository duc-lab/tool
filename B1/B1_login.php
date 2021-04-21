<!DOCTYPE html>
<html>
<
<body>
	<form method="post">
		<h1>LOG IN</h1>
		USERNAME: <input type="text" name="username"></br>
		PASSWORD: <input type="password" name="password"></br>
		<input type="submit" name="dowhat" value="Sign in"/> </br>
	</form>
	<a href = "B1_signup.php"> </br> Sign up </br></br> </a>	
	<a href = "B1_changepassword.php"> </br> Change the password </br> </br> </a>
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
			$query = "SELECT * FROM account WHERE USERNAME = '$name' LIMIT 1";
			$result = mysqli_query($conn, $query);
			if($result && mysqli_num_rows($result) > 0)
			{
				$data = mysqli_fetch_assoc($result);	
				if($data['PASSWORD'] === $pass)
				{
					$_SESSION['ID'] = $data['ID'];
					echo "Sign in successfully!";
					echo "location.href='B1_index.php'";
				}
			}
			echo "Username or Password incorrect!";	
		}
		else
		{
			echo "Sign in failed! Please try again";
		}
	}	
	

?>