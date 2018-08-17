<?php 
	session_start();
	include "database.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Welcome <?php echo $_SESSION['name']; ?></title>
 	<meta charset = "utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale=1.0">
	<link rel = "stylesheet" type = "text/css" href = "homepage.css"></link>
	<script src = "jquery-3.2.1.js"></script>
	<script src = "./bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./bootstrap-3.3.4-dist/css/bootstrap.min.css"></link>
 </head>
 <body style="background-color: #cacecf;">
	<div class="container">
		<div class="row">
			<div class="col">
			</div>
			<div class="col-auto">
				<h1>WELCOME TO ARIVLAPP ADMIN PORTAL</h1>
				<h2>HELLO <?php echo $_SESSION['name']; ?>!</h2>
			</div>
			<div class="col">
			</div>
		</div>
 	</div>
 	<a href="homePage.php">Logout</a>
	
	<?php
		$query = "SELECT * FROM users WHERE deleted = 0 AND active = 0";
	$result = $conn->query($query);
	if($result)
	{	
		echo'<table class="table table-bordered"> <caption>Users</caption>';
		echo "<thead> <tr>";
		echo "<th>Name</th>";
		echo "<th>Surname</th>";
		echo "<th>Phone</th>";
		echo "<th>Residency</th>";
		echo "<th>Active</th>";
	
		echo "</tr></thead>";
		
		while($row=$result->fetch_assoc()){
			echo "<form action = 'activateUser.php' method = 'POST'>";
			echo "<tr>";
			echo "<td>".$row["name"]."</td>";
			echo "<td>".$row["surname"]."</td>";
			echo "<td><input type = 'text' name = 'number' value = '".$row['number']. "'></td>";
			echo "<td>";
			if($row["resident"] == 1){
				echo "Permanent";
			}else{
				echo "Guest";
			}
			echo "</td>";
						echo "<td>";
			if($row["active"] == 0){
				echo "<button type='submit'>No</button>";
			}else{
				echo "Yes";
			}
			echo "</td>";
			
			echo"</tr>";
			echo"</form>";
			
		if(isset($_POST['$count'])){
			$id=$row["name"];
			echo "HEYY".$row["name"]. '    ';
			$sql = "UPDATE users SET active = 0 WHERE name= '$id'";
			$res = $conn->query($sql);
			if($res == FALSE){
				echo"No data selected";
			}		
	}
		}
		echo "</table>";
	}
	 echo "<a href='homePage.php'>Back<a>";
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6">
				<form method="POST" action="addUser.php">
					<h3>Add User</h3>
					<div>
						<label for="name">Name:</label>
						<input type="text" name="name" id="name" placeholder="Enter User Name" required >
					</div>
					<div>
						<label for="surname">Surname:</label>
						<input type="text" name="surname" id="surname" placeholder="Enter User Surname" required>
					</div>
					<div>
						<label for="id">ID Number:</label>
						<input type="text" name="id" id="id" placeholder="Enter User ID Number" required>
					</div>
					<div>
						<label for="number">Mobile Number</label>
						<input type="text" name="number" id="number" placeholder="Enter User Number" required>
					</div>
					<div>
						<label for="license">License Plate</label>
						<input type="text" name="license" id="license" placeholder="Enter User License Plate" required>
					</div>
					<div>
						<label for="email">Email Address</label>
						<input type="email" name="email" id="email" placeholder="Enter Email Address" required>
					</div>	
					<div>
						<label for="estate">Estate</label>
						<input type="text" name="estate" id="estate" placeholder="Enter Estate Name" required>
					</div>	
					<div>
						<input type="submit"class="btn" name="add" value="ADD">
					</div>
				</form>
		</div>
			<div class="col-lg-6">
				<form method="POST" action="deleteUser.php">
					<h3>Deactivate User</h3>
					<div>
						<label for="id">ID Number</label>
						<input type="text" name="id" id="id" placeholder="Enter User ID Number" required >
					</div>
					
					<div>
						<input type="submit"class="btn" name="add" value="DELETE">
					</div>
				</form>
			</div>
		</div>
	</div>
 </body>
 </html>