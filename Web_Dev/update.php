<?php
	include 'dbconfig.php';

	
	function sanitise_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}
	$phone = sanitise_input($_POST['phone']);
	$newphone = sanitise_input($_POST['newphone']);
        $password= sanitise_input($_POST['password']);
	$newpassword= sanitise_input($_POST['newpassword']);
    
	if($phone != "Old Number" && $newphone != "New Number" ){
	
	$update1->execute();
	$update1->close();
	}
	if($password != "Current" && $newpassword != "New" ){
	$update2->execute();
	$update2->close();
	}
	
	
	
	
	$connection->close();
	header('Location: welcome.html');

?>
