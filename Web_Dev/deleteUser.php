<?php

	$host="localhost";
	$username="root";
	$password="arival123";
	// Create a new connection and select database
	$connection=new mysqli($host, $username, $password);
	// Check if connected
	// Might fail if password is incorrect, server is unreachable, etc
	if($connection->connect_error)
	die("Connection failure: ".$connection->connect_error);
	else
	{
	$connection->select_db("arivldb");
	echo"Connection success";
	}
	
	function sanitise_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}
    
	$phone = sanitise_input($_POST['phone']);
	
	$query = "DELETE FROM `users` WHERE `users`.`phone` = '$phone'";
	$result = $connection->query($query);

	if($result)
	{
		echo "DELETED";
		header("location:welcome.html");

	}
	
	
?>