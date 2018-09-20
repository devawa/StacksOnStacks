<?php 
	session_start();
	include "database.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Welcome <?php echo $_SESSION['name']; ?> | Admin Portal</title>
 	<meta charset = "utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale=1.0">
	<link rel = "stylesheet" type = "text/css" href = "homepage.css"></link>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 </head>
<body class="cyan darken-3">
	<?php include "nav-bar-logout.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col s12 m12">
				<h3 class="white-text">Hi <?php echo $_SESSION['name']; ?>, welcome to Arivl Admin Portal</h3>
			</div>
		</div>

		<div class="row">
			<div class="col s12">
				<ul class="tabs z-depth-1 cyan darken-2">
					<li class="tab col s4"><a class="active white-text" href="#test1">Register Estate</a></li>
					<li class="tab col s4"><a  href="#test2" class="white-text">Remove Estate</a></li>
					<li class="tab col s4"><a href="#test3" class="white-text">Add User</a></li>
				</ul>
    		</div>

			<div id="test1" class="col s12">
				<div class="row">
					<?php
						$query = "SELECT * FROM users";
						$result = $conn->query($query);

						if($result){
							echo'<table class="striped white-text">'; 
							echo '<caption class="white-text flow-text">Users</caption>';
							echo "<thead><tr>";
							echo "<th>Name</th>";
							echo "<th>Surname</th>";
							echo "<th>Phone</th>";
							echo "<th>Residency</th>";
							echo "<th>Active</th>";
							echo "</tr></thead>";

							while($row=$result->fetch_assoc()){
								echo "<tr>";
									echo "<td>".$row['name']."</td>";
									echo "<td>".$row["surname"]."</td>";
									echo "<td>".$row['number']."</td>";
									if($row["resident"] == 1){
										echo "<td>Permanent</td>";
									}else{
										echo "<td>Guest</td>";
									}

									echo "<td><a id='acceptBtn'><i class='btn green material-icons'>check</i></a> ";
									echo "<a id='editBtn'><i class='btn yellow material-icons'>visibility</i></a>";
									echo " <a id='deleteBtn'><i class='btn red material-icons'>delete</i></a>";
									echo "</td>";
								echo "</tr>";
							}
						}
						
					?>
				</div>
			</div>
			<div id="test2" class="col s12">
				<div class="row">
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
			<div id="test3" class="col s12">
				<div class="row">
					<form action="addUser.php" method="POST" role="form" class="col s12 m6 card">
						<div class="row">
							<div class="input-field col s12">
								<input id="name" name="name" type="text" class="validate">
								<label for="name">Name</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="surname" name="surname" type="text" class="validate">
								<label for="surname">Surname</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="id" name="id" type="text" class="validate">
								<label for="id">Surname</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="number" name="number" type="text" class="validate">
								<label for="number">Mobile Number</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="license" name="license" type="text" class="validate">
								<label for="license">License</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="email" name="email" type="email" class="validate">
								<label for="email">Email Address</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="estate" name="estate" type="text" class="validate">
								<label for="estate">Estate</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input type="submit" class="btn" value="Submit">
							</div>
						</div>
					</form>
				</div>
			</div>


		</div>





	</div>
</body>



<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.11/sweetalert2.js"></script>
<script>
  $(document).ready(function(){
    $('.tabs').tabs();
  });
</script>
</html>