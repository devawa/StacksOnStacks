<?php
	session_start();
	include 'database.php';
	$name= $_POST['name'];
	$surname= $_POST['surname'];
	$id= $_POST['id'];
	$number= $_POST['number'];
	$license = $_POST['license'];
	$email =  $_POST['email'];

	$idd = $_SESSION['id'];

	$query = "UPDATE users SET name ='$name', surname='$surname', 
	number = '$number', idNumber ='$id', license= '$license', email = '$email' WHERE user_id = '$idd'";
	$result = $conn->query($query);
	header("Location:resident.php");
?>
