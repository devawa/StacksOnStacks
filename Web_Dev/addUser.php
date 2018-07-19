<?php

	include 'dbconfig.php';
	

	
	function sanitise_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}
	 
	//set parameters  and execute
	$phone = sanitise_input($_POST['phone']);
        $password= sanitise_input($_POST['password']);
	$name = sanitise_input($_POST['name']);
        $surname = sanitise_input($_POST['surname']);
	$resident = sanitise_input($_POST['resident']);
	$active = 1;
	$add->execute();
	
	$add->close();
	$connection->close();


	header('Location: welcome.html');
	
        	
?>
