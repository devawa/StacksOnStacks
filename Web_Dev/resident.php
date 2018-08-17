<?php 
	session_start();
	include "database.php";
	//echo $_SESSION['name'];
 ?>

<!DOCTYPE html>
<html>
<head>
 	<title>Welcome <?php echo $_SESSION['name']; ?></title>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale=1.0">
	<meta name="author" content="StacksonStacks" >
	<link rel = "stylesheet" type = "text/css" href = "homepage.css">
	<!--link rel="stylesheet" href="./bootstrap-3.3.4-dist/css/bootstrap.min.css"></link-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="cyan darken-3">
	<?php include "nav-bar-logout.php";?>

	<div class="container">
		<div class="row">
			<div class="col s12 m12">
				<h3 class="white-text">Welcome <?php echo $_SESSION['name']; ?>, to the Arivl Resedential Portal</h3>
				<p class="flow-text white-text">
					Down below you may add a guest
				</p>
			</div>
		</div>

		<div class="row">
			<ul class="collapsible">
				<li>
					<div class="collapsible-header"><i class="material-icons">add</i>Add Guest</div>
					<div class="collapsible-body white">
						<div class="row">
							<form action="addGuest.php" method="POST" role="form" class="col s12 m6 card">
								<div class="row">
									<div class="input-field col s12 m8 offset-m2">
										<input type="text" name="name" required class="validate" id="name">
										<label for="name">Name</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m8 offset-m2">
										<input class="validate" type="text" name="surname" id="surname">
										<label for="surname">Surname</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m8 offset-m2">
										<input class="validate" type="text" name="id" required id="id">
										<label for="id">ID Number</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m8 offset-m2">
										<input class="validate" type="text" name="number" required id="number">
										<label for="number">Phone Number</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m8 offset-m2">
										<input class="validate" type="text" name="license" required id="License">
										<label for="License">License Plate</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m8 offset-m2">
										<input class="form-control" type="text" name="email" required id="email">
										<label for="email">Email Address</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m8 offset-2 center">
										<button type="submit" class="btn">Add Guest</button>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m8 offset-2 center">
										<button type="submit" class="btn red">Clear</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</li>
				<li>
					<div class="collapsible-header"><i class="material-icons">directions_car</i>Add Vehicle</div>
					<div class="collapsible-body white">
						<div class="row">
							<p class="flow-text">Here you are going to be adding your car</p>
							<form method="POST" action="addVehicles.php" role="form" class="col s12 m6 card">
								<div class="row">
									<div class="input-field col s12 m8 offset-m2">
										<input type="text" name="registration" required class="validate" id="registration">
										<label for="registration">Registration plate</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m8 offset-m2">
										<button type="submit" class="form-control btn btn-success">Add Vehicle</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</li>
				<li>
					<div class="collapsible-header"><i class="material-icons">edit</i>Edit</div>
					<div class="collapsible-body white"><span>Lorem ipsum dolor sit amet.</span></div>
				</li>
			</ul>
		</div>

	</div>
</body>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
<script>
	$(document).ready(function(){
    $('.collapsible').collapsible();
  });
</script>
</html>