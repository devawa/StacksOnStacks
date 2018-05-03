<?php
	function print(){
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
	
	$query = "SELECT * FROM `users` WHERE `users`.`phone` = '$phone'";
	$result = $connection->query($query);

	if($result)
	{
		while($row=$result->fetch_assoc()){
			echo "Name: ".$row["name"];
			echo "<br><br>";
			echo "Surname: ".$row["surname"];
			echo "<br><br>";
			echo "Phone: ".$row["phone"];
			echo "<br><br>";
			echo "Email: ".$row["email"];
			echo "<br><br>";
			echo "Residentcy: ";
			if($row["resident"] == 1){
				echo "Permanent";
			}else{
				echo "Guest";
			}
			echo "<br><br>";
			echo "<a href='welcome.html' >Back</a>";

			
		}
	}
	}

	
	
	
?>