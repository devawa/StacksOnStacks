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
	echo "<br><br>";

	}
	
	function sanitise_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}
	$phone = sanitise_input($_POST['phone']);
	$newphone = sanitise_input($_POST['newphone']);
        $email= sanitise_input($_POST['email']);
	$newemail= sanitise_input($_POST['newemail']);
    
	if($phone != "Old Number" && $newphone != "New Number" ){
	$query = "UPDATE users SET phone='$newphone' WHERE phone='$phone' ";
	$result = $connection->query($query);
	}
	if($email != "Current" && $newemail != "New" ){
	$query = "UPDATE users SET email='$newemail' WHERE email='$email' ";
	$result = $connection->query($query);
	}
	
	header("location:welcome.html");


?>