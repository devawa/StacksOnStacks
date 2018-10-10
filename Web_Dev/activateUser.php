<?php
	session_start();
	include "database.php";
	echo $_POST['number']; 
	$num= $_POST['number']; 
	
	if(isset($_POST["activate"])){
		$query = "update users set active=1 where number='$num' and active =0";
		if($result = $conn->query($query)){
			echo "Added!\n";
			echo $num;
			header("Location:admin.php");
		}
		else{
			echo "Failed activate query";
		}
	}
	
	/*if(isset($_POST["look"]))
	{
		$query = "select users where number='$num'";
		if($result = $conn->query($query)){
			
		}
	}*/
	
	if(isset($_POST["deactivate"]))
	{
		$query = "update users set deleted=1 where number='$num' and deleted =0";
		if($result = $conn->query($query)){
			echo "Deleted!\n";
			header("Location:admin.php");
		}
		else{
			echo "Failed deactivate query";
		}
	}
?>