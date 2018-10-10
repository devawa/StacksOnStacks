<?php 
	session_start();
	include "database.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Welcome <?php echo $_SESSION['name']; ?> | Admin Portal</title>
 	<meta charset = "utf-8">
	 <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name = "viewport" content = "width = device-width, initial-scale=1.0">
	<link rel = "stylesheet" type = "text/css" href = "homepage.css"></link>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="icon" href="images/logo.png">
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
					<li class="tab col s4"><a class="active white-text" href="#test1">User Activation</a></li>
					<li class="tab col s4"><a  href="#test2" class="white-text">Add User</a></li>
					<li class="tab col s4"><a href="#test3" class="white-text">Deactivate User</a></li>
				</ul>
    		</div>

			<div id="test1" class="col s12">
				<div class="row">
					<?php
						$query = "SELECT * FROM users WHERE deleted = 0 AND active = 0";
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
							echo "<form action = 'activateUser.php' method = 'POST'>";
								echo "<tbody><tr>";
									echo "<td>".$row['name']."</td>";
									echo "<td>".$row["surname"]."</td>";
									echo "<td>".$row['number']."</td>";
									
									$number = $row['number'];
									echo"<input type='hidden' name='number' value='$number'/>";
									
									if($row["resident"] == 1){
										echo "<td>Permanent</td>";
									}else{
										echo "<td>Guest</td>";
									}
									$idd = $_SESSION['id'];
									echo "<td><button type='submit' name='activate'><i class='btn green material-icons'>check</i></button> ";
									echo "<a class='waves-effect waves-light btn modal-trigger' href='#file'><i class='btn yellow material-icons'>visibility</i></a>";
									echo "
										<div id='file' class='modal'>
									<div class='modal-content'>
											<h4>User Information</h4>";
											$query = "SELECT * FROM users WHERE user_id = '$idd'";
										$res = $conn->query($query);
										if($row = mysqli_fetch_array($res)){
										echo "<p>Name: ". $row['name'] ."</p>
												<p>Surname: ". $row['surname'] . "</p>
												<p>Email Address: ".  $row['email'] . "</p>
												<p>Phone Number: ". $row['number'] ."</p>
												<p>ID Number: ". $row['idNumber'] ."</p>
												<p>License Number: ". $row['license'] ."</p>";
										}
									echo "</div>
									<div class='modal-footer'>
										<a href='#!' class='modal-close waves-effect waves-green btn-flat'>Close</a>
									</div>
								</div>
									";
									echo "<button type='submit' name='deactivate'><i class='btn red material-icons'>delete</i></button>";
									echo "</td>";
								echo "</tr></tbody>";
								echo"</form>";
								
								/*if(isset($_POST["look"]))
								{
									$query = "select users where number='$num'";
									if($result = $conn->query($query)){
										
									}
								}*/
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
	$('.carousel').carousel();
        $('.slider').slider();
        $('.parallax').parallax();
    $('.tabs').tabs();
	$('.modal').modal();
  });
</script>
</html>