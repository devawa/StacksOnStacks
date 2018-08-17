<?php
	session_start();
	include "database.php";

	$eName= $_POST['Ename'] ;
	$eAdd=$_POST['EAddress'];
	$email=$_POST['email'];
	$query = "select * from estates where estate_email = '$email'";
	$result = $conn->query($query);
	if($found = $result->fetch_assoc()){
		echo "Estate Exists";
		#header("Location: EstateReg.php");
	}
	else{
		$query ="insert into estates (estate_name,estate_address,estate_email,active) 
				values('$eName','$eAdd','$email',1)
		";
		if($result = $conn->query($query)){
			echo "Estate Added";
			#header("Location:EstateReg.php");
		}
	}
?>