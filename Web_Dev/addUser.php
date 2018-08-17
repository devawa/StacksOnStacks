<?php
	session_start();
	include 'database.php';
	$name= $_POST['name'];
	$surname= $_POST['surname'];
	$id= $_POST['id'];
	$number= $_POST['number'];
	$license = $_POST['license'];
	$email =  $_POST['email'];
	$password ;
	$estate = $_POST['estate'];
	
	$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	for ($i = 0; $i < 8; $i++) {
        $n = rand(0, strlen($alphabet)-1);
        $pass[$i] = $alphabet[$n];
	}
	$password=implode("",$pass);
	
	
	
	
	$query = "insert into users 
				(name,surname,number,license,email,active,guestRequest,resident,loggedOn,password,deleted)
				VALUES ('$name','$surname','$number','$license','$email',0,0,1,0,'$password',0)"; 
	if($result = $conn->query($query))
	{
		echo "inside 1"; 
		$sql = "SELECT * FROM users WHERE name = '$name' AND password= '$password' " ;
		$result = $conn->query($sql);
		if(!$row = $result->fetch_assoc())
		{

				echo ("Unable to Add user");
				header("Location: homePage.php");
		}else{
			echo "inside 2 with user_id: ".$row['user_id']; 
			$user_id = $row['user_id'];
				$criteria = "Resident";
				$query = "insert into privileges (user_id,criteria,estate,activeEstate) values ($user_id, '$criteria','$estate',1)";
				if($result = $conn->query($query)){
				echo "Added to privileges"; 
				

				$msg = " Dear ".$name." ".$surname." \n Password = ".$password." Username = ".$name." \n Estate = ".$estate;
				$header = "From: Arivl";
				mail($email,"Registation",$msg,$header);
				
				header("Location:homePage.php");
			}else{
				echo "didnt add";
			}
			}
		}
	else{
		die ("something went wrong");
	}
?>
