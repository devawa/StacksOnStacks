<?php
	session_start();
	include 'database.php';
	$name= $_POST['name'];
	$surname= $_POST['surname'];
	$id= $_POST['id'];
	$idd=$_SESSION['id'];
	$number= $_POST['number'];
	$license = $_POST['license'];
	$email =  $_POST['email'];
	$password = "temp";
	
	$query = "insert into users 
				(name,surname,number,license,email,active,guestRequest,resident,loggedOn,password,deleted)
				VALUES ('$name','$surname','$number','$license','$email',0,1,0,0,'$password',0)"; 
	if($result = $conn->query($query))
	{
		echo "inside 1"; 
		$sql = "SELECT * FROM users WHERE name = '$name' AND password= '$password' " ;
		$result = $conn->query($sql);
		if(!$row = $result->fetch_assoc())
		{

				echo ("wrong username or passsword");
			//	header("Location: homePage.php");
		}else{
			echo "inside 2 ".$row['user_id']; 
			$user_id = $row['user_id'];
			$query = "SELECT * from privileges WHERE user_id =". $idd."";
			if(!$result= $conn->query($query)){
				echo "not working";
			}
			if($row = $result->fetch_assoc()){
				$estate = $row['estate'];
				$criteria = "Guest";
				$query = "insert into privileges (user_id,criteria,estate,activeEstate) values ($user_id, '$criteria','$estate',1)";
				if($result = $conn->query($query)){
				echo "Added to privileges"; 
				header("Location:resident.php");
			}else{
				echo "didnt add";
			}
			}
			
		}
	}
	else{
		die ("something went wrong");
	}
?>