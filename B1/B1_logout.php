<?php

session_start();

if(isset($_SESSION['ID']))
{
	unset($_SESSION['ID']);
}

echo "<script>alert('Sign out successfully!')</script>";
echo "<script>location.href='B1_login.php'</script>";
?>