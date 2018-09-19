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
	<link rel = "stylesheet" type = "text/css" href = "css/admin.css"></link>
	<script src = "jquery-3.2.1.js"></script>
	<script src = "script.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
	<link rel="icon" type="image/png" href="Images/logo.jpg" />
 </head>
 <body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><img src="Images/logo.jpg" width="42" height="42"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><h5>Arivl</h5></a>
      </li>
     
    </ul>
    <form action="homeAdmin.php" method="POST">
      
      <button class="btn" type="submit">Logout</button>
    </form>
  </div>
</nav>
 
	<div class="container">
		<div class="row">
			<div class="col">
			</div>
			<div class="col-auto">
				<h1>Welcome to Arivl Admin Portal</h1>
				<h2>Hello <?php echo $_SESSION['name']; ?>!</h2>
			</div>
			<div class="col">
			</div>
		</div>
 	</div>

	
	<?php
		$query = "SELECT * FROM users WHERE deleted = 0 AND active = 0";
	$result = $conn->query($query);
	if($result)
	{	
		echo'<table class="table table-bordered table-hover table-fixed scroll">';
		echo "<thead class='thead-dark'> <tr>";
		echo "<th>Name</th>";
		echo "<th>Surname</th>";
		echo "<th>Phone</th>";
		echo "<th>Residency</th>";
		echo "<th>Active</th>";
	
		echo "</tr></thead>";
		
		while($row=$result->fetch_assoc()){
			echo "<form action = 'activateUser.php' method = 'POST'>";
			echo "<tbody><tr>";
			echo "<td>".$row["name"]."</td>";
			echo "<td>".$row["surname"]."</td>";
			echo "<td>".$row['number']. "</td>";
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
			
			echo"</tr></tbody>";
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
	 echo "<br/>";
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6">
				<button type="button" class="btn" data-toggle="modal" data-target="#user">Add User</button>
				<div class="modal fade" id="user" role="dialog">
					<div class="modal-dialog">
						
						  <!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Add User</h4>
							</div>
							<div class="modal-body">
								<form method="POST" action="addUser.php">
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
						</div>
				  
					</div>
				</div>
				
		</div>
		<div class="col-lg-6">
			<button type="button" class="btn" data-toggle="modal" data-target="#myModal">Deactivate User</button>
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
					
					  <!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Deactivate User</h4>
						</div>
						<div class="modal-body">
							<form method="POST" action="deleteUser.php">
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
			</div>
				
			
		</div>
	</div>
 </body>
 </html>