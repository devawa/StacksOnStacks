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
	$statement = mysqli_prepare($con, "SELECT * FROM main WHERE number=? AND password=?");
	mysqli_stmt_bind_param($statement, "ss",$number,$password);
	mysqli_stmt_execute($statement);

//	my_sqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement,$user_id,$name,$surname,$password,$age,$id_number,$number);
	
	$response = array();
	$response["success"]= false;
	while(mysqli_stmt_fetch($statement)){
		$response["success"]=true;
		$response["name"] = $name;
		$response["surname"]= $surname;
		$response["password"]= $password;
		$response["age"]= $age;
		$response["id_number"]= $id_number;
		$response["number"]= $number;
	}
	echo json_encode($response);
	$response = array();
	$response["success" ] = true;
	echo json_encode($response);
	
?>
