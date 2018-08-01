<?php
	session_start();
	include "database.php";
	echo $_POST['number']; 
	$num= $_POST['number']; 
	
	$query = "update users set active=1 where number='$num' and active =0";
	if($result = $conn->query($query)){
		echo "Added!\n";
		echo $num;
		header("Location:admin.php");
	}else{
		echo "Failed query";
	}
?>