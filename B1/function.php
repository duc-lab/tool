<?php

function login_data($conn)
{
	if(isset($_SESSION['ID']))
	{
		$id = $_SESSION['ID'];
		$sql = "SELECT * FROM account WHERE ID = '$id' LIMIT 1";

		$result = mysqli_query($conn,$sql);
		if ($result && mysqli_num_rows($result) > 0)
		{
			$data = mysqli_fetch_assoc($result);
			return $data;
		}
	}

	header("Location: B1_login.php");
	die;
}

function random_num($length)
{
	$text = "";
	if($length < 3)
	{
		$length = 3;
	}
	$len = rand(3,$length);

	for ($i=0; $i < $len; $i++) { 
		$text .= rand(0,9);
	}
	return $text;
}
