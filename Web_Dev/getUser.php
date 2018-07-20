<?php
	include 'dbconfig.php';
	
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
			echo "password: ".$row["password"];
			echo "<br><br>";
			echo "Residentcy: ";
			if($row["resident"] == 1){
				echo "Permanent";
			}else{
			
				echo "Guest";
			}
						echo "<br><br>";

			echo "Stauts: ";
			if($row["active"] == 1){
				echo "active";
			}else{
				echo "deleted";
			}
			echo "<br><br>";
			echo "<a href='welcome.html' >Back</a>";

			
		}
	}
	

	
	
	
?>
