<?php
		session_start();
		//phpinfo();
		include 'database.php';
		$use = $_POST['uname'];
		$pass = $_POST['psw'];
		$_SESSION['password'] = $pass;
		$_SESSION['username'] = $use;
		$sql = "SELECT * FROM users WHERE name='$use' AND password ='$pass' ";
		$result = $conn->query($sql);
		$active = false;
		if($row = $result->fetch_assoc())
		{
			$id = $row['user_id'];
			$active = $row['active'];
			$sql1 = "SELECT * FROM privileges WHERE user_id ='$id' "; 
			$result = $conn->query($sql1);
			if($row = $result->fetch_assoc())
			{
				if($row['criteria']=="Admin"&&$active){
				echo "you are logged in to your username!";
				$_SESSION['name'] = $row['name'];
				$_SESSION['id'] = $row['user_id'];
				echo $_SESSION['id'];
				header("Location: admin.php");
				}
				else if($row['criteria']=="Resident"&&$active){
					echo "you are logged in to your username! in else";
				$_SESSION['name'] = $row['name'];
				$_SESSION['id'] = $row['user_id'];
				echo $_SESSION['name'];
				header("Location: resident.php");
				}
				else{
					header("Location:homePage.php");
				}
				
			}
			else{}
		}
		else 
		{
			echo ("wrong username or passsword");
				header("Location: homePage.php");
		}
		
	?>
