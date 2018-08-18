<?php
	session_start();
	include 'database.php';

	$id= $_POST['id'];
	$query = "UPDATE users set active = 0 where idNumber =$id AND active = 1";
	if($result = $conn->query($query))
	{
		$query = "UPDATE users set deleted = 1 where idNumber =$id AND active = 0";
		if($result = $conn->query($query))
		{
			header("Location:admin.php");
		}
		else
		{
			echo"No user deleted";
		}		
	}
	else
	{
		die ("something went wrong");
	}
?>