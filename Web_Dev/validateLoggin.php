<?php
	session_start();

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
    
	$username = sanitise_input($_POST['username']);
        $password = sanitise_input($_POST['password']);


	$query="SELECT * FROM admins ";
	$result=$connection->query($query);
	$found=false;

	while($row=$result->fetch_assoc())
	{
		if($row["username"] == $username && $row["password"] == $password){
		$found = true;
		}
	}
	if($found){
		$_SESSION['sid'] = session_id();
		$_SESSION['user'] = $username;
		header("location:welcome.html");
	
	}else{
		echo "Invalid Details";
		header("location:index.html");
		
	
	}
	
	$connection->close();
	
	
?>