<?php
	//$con = mysqli_connect("192.168.43.27:8080","root","", "arivl");
	session_start();
	$con = mysqli_connect("localhost","root","", "arivl");
	if(!$con){
		$response = array();
		$response["success"]= false;
		echo json_encode($response);
	}
	$number =$_POST["number"];
	$password =$_POST["password"];
	$statement = mysqli_prepare($con, "SELECT * FROM users WHERE number=? AND password=? AND active=1");
	mysqli_stmt_bind_param($statement, "ss",$number,$password);
	mysqli_stmt_execute($statement);

//	my_sqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement,$user_id,$name,$surname,$number,$idNumber,$license,$email,$active,$guestRequest,$resident,$loggedOn,$password,$deleted);
	
	$response = array();
	$response["success"]= false;
	while(mysqli_stmt_fetch($statement)){
		$response["success"]=true;
		$response["name"] = $name;
		$response["surname"]= $surname;
		$response["number"] = $number;
		$response["idNumber"] = $idNumber;
		$response["license"] = $license;
		$response["email"]= $email;
		$response["active"]= $active;
		$response["guestRequest"]= $guestRequest;
		$response["resident"]= $resident;
		$response["loggedOn"] = $loggedOn;
		$response["password"] = $password;
		$response["deleted"] = $deleted;
	}
	echo json_encode($response);
	$response = array();
	$response["success" ] = true;
	echo json_encode($response);
	
?>
