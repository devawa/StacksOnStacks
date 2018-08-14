<?php
	include "database.php";
	$eName= $_POST['Ename'] ;
	
	$query = "delete from estates where estate_name = '$eName'";
	$result = $conn->query($query);
	
	if($result == TRUE){
		header("Location: Arivl.php");
	}
	else
	{
		echo "Error: ". $conn->error;
	}
?>