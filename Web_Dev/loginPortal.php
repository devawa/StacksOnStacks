<?php
		session_start();
		//phpinfo();
		include 'database.php';
		$use = $_POST['uname'];
		$pass = $_POST['psw'];
		$_SESSION['password'] = $pass;
		$_SESSION['username'] = $use;

		$query = "select * from super where number='$use' and password='$pass'" ;
		$result = $conn->query($query);
		if($row = $result->fetch_assoc()){
			$nme = $row['name'];
			$_SESSION['name'] = $nme;
			header("Location: Arivl.php");
		}else{
			$sql = "SELECT * FROM users WHERE number='$use' AND password ='$pass' ";
		$result = $conn->query($sql);
		$active = false;
		if($row = $result->fetch_assoc())
		{
			$id = $row['user_id'];
			$active = $row['active'];
			$nme = $row['name'];
			
			$sql1 = "SELECT * FROM privileges WHERE user_id ='$id' "; 
			
			$result = $conn->query($sql1);
			if($row = $result->fetch_assoc())
			{
				if($row['criteria']=="Admin"&&$active){
					$est = $row['estate'];
					$id = $row['user_id'];
					$query = "select * from estates where estate_name = '$est' AND active = 1";
					$result = $conn->query($query);
					if($found = $result->fetch_assoc()){
						echo "you are logged in to your username!";
						$_SESSION['name'] = $nme;
						$_SESSION['id'] = $id;
						echo $_SESSION['name'];
						header("Location: admin.php");		
					}
				
				}
				else if($row['criteria']=="Resident"&&$active){
				
					//echo "you are logged in to your username! in else";
				$_SESSION['name'] = $nme;
				$_SESSION['id'] = $row['user_id'];
				echo $_SESSION['name'];
				header("Location: resident.php");
				}
				else{
					echo "third ". $conn->error;
					header("Location:tenant.php");
				}
				
			}
			else{
				echo "first ".$conn->error;
			}
		}
			else 
			{
				echo "second ". $conn->error;
				header("Location: tenant.php");
			}
		}

		
		
	?>
