<?php
	session_start();
	include 'database.php';

	$reg = $_POST['registration'];
	$id = $_SESSION['id'];

	$sql1 = "select * from cars where registration = '$reg' ";
	$res = $conn->Query($sql1);
	if($row = $res->fetch_assoc()){
		echo "Vehicle exists";
	}

	$sql = "INSERT into cars (user_id,registration) Values ($id,'$reg')";
	if($result = $conn->query($sql)){
		echo "Added vehicles";
	}else{echo "Not Added"
		.$conn->error; 	
}
?>