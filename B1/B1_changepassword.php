<!DOCTYPE html>
<html>
<head>
	<title>
		Log in
	</title>
</head>
<body>
	<form method="post">
		<h3>CHANGE THE PASSWORD</h3>
		USERNAME: <input type="text" name="username"></br>
        OLD PASSWORD: <input type= "password" name = "oldpassword"></br>
		NEW PASSWORD: <input type="password" name="newpassword"></br>
        RETYPE PASSWORD <input type="password" name="repassword"></br>
		<input type="submit" name="dowhat" value="Submit"/></br>
	</form>
</body>
</html>

<?php
    include("conn.php");
    include("function.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
        $name = $_POST['username'];
        $oldpass = $_POST['oldpassword'];
        $newpass = $_POST['newpassword'];
        $repass = $_POST['repassword'];

            if(!empty($name) && !empty($oldpass) && !is_numeric($name) && !empty($newpass) && !empty($repass))
            {
                $query = "SELECT * FROM account WHERE USERNAME = '$name' LIMIT 1";
                $result = mysqli_query($conn, $query);

                if($result && mysqli_num_rows($result) > 0)
                {
                    $data = mysqli_fetch_assoc($result);	
                    if($data['PASSWORD'] === $oldpass && $newpass === $repass)
                    {
                        mysqli_query($conn, "UPDATE account SET PASSWORD ='$newpass' WHERE USERNAME = '$name'");
                        echo "<script>alert('Successfully change the passsword!')</script>";
                        echo "<script>location.href='B1_index.php'</script>";
                    }
                }
            }
            else
            {
                echo "Change the password failed. Please resubmit your account again.";
            }    
    }           

?>
