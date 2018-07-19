<?php

	include 'dbconfig.php';
	
	function sanitise_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}
    
	$phone = sanitise_input($_POST['phone']);
	$active = 0;
	
	$delete->execute();
	
	$delete->close();
	$connection->close();

	header('Location: welcome.html');

	
?>
