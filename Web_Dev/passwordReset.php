<?php
		session_start();
		//phpinfo();
		include 'database.php';
		$use = $_POST['uname'];
		$password ;

		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		for ($i = 0; $i < 8; $i++) {
		$n = rand(0, strlen($alphabet)-1);
		$pass[$i] = $alphabet[$n];
		}
		$password=implode("",$pass);
		
		
		$query = "UPDATE users set password = '$password' where number ='$use'";
		
				if($result = $conn->query($query))
		{
			header("Location:index.php");
		}
		else
		{
			echo"No user ";
		}	
		
?>
