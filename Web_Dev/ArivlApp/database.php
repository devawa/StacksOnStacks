<?php
	$conn = new mysqli ("localhost","root","","arivl");
	if(!$conn){
		die("connection failed: ".mysqli_connect_error());
	}
	echo date('r');
?>