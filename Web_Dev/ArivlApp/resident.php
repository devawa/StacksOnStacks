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
	<link rel = "stylesheet" type = "text/css" href = "homepage.css"></link>
	<script src = "jquery-3.2.1.js"></script>
	<script src = "./bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./bootstrap-3.3.4-dist/css/bootstrap.min.css"></link>
 </head>
 <body style="background-color: #cacecf;">
 	<div class="container-fluid">
 		</data><h1>WELCOME TO ARIVLAPP RESIDENTIAL PORTAL</h1>
 		<h2>BELOW <?php echo $_SESSION['name']; ?> MAY ADD A GUEST USER</h2>
 		<a href="homePage.html">Logout</a>
 	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-xs-6 col md-offset-1">
				<div class="panel panel-login">
				<div class="panel-body">
					<h1>ADD GUEST</h1>
	 				<form method="POST" action="addGuest.php">
	 				<div class = "form-group">
	 					<label for="name">
	 						Name:
	 					</label>
	 					<input type="text" name="name" placeholder="Guest Name" required class="form-control" tabindex="1" id="name"><br>
	 				</div>
	 				<div class = "form-group">
	 					<label for="surname">
	 						Surname:
	 					</label>
		 				<input class="form-control" type="text" name="surname" placeholder="Guest Surname" required tabindex="2" id="surname"><br>
		 			</div>
		 			<div class = "form-group">
		 				<label for="id">ID Number:</label>
		 				<input class="form-control" type="text" name="id" placeholder="Guest ID number" required tabindex="3" id="id"><br>
		 			</div>
		 			<div class = "form-group">
		 				<label for="number">Mobile 	Number</label>
			 			<input class="form-control" type="text" name="number" placeholder="Guest Mobile Number" required tabindex="4" id="number"><br>
			 		</div>
			 		<div class = "form-group">
			 			<label for="License">	License Plate</label>
			 			<input class="form-control" type="text" name="license" placeholder="License Plate" required tabindex="5" id="License"><br>
			 		</div>
			 		<div class = "form-group">
		  				<label for="email">Email Address</label>
		 				<input class="form-control" type="text" name="email" placeholder="email" required tabindex="6" id="email"><br>
		 			</div>
			 			<button type="submit" class="form-control btn btn-success">Submit</button>
						<button type="button" class="form-control btn btn-danger">Cancel</button>		
					</form>
				</div>
				</div>
		 	</div>	



		 	<div class="col-lg-6 col-md-6 col-xs-6 col md-offset-1">
				<div class="panel panel-login">
				<div class="panel-body">
					<h1>ADD VEHICLES</h1>
	 				<form method="POST" action="addVehicles.php">
	 				<div class = "form-group">
	 					<label for="name">
	 						Registration Plate:
	 					</label>
	 					<input type="text" name="registration" placeholder="Registration Plate" required class="form-control" tabindex="1" id="name"><br>
	 				</div>
			 			<button type="submit" class="form-control btn btn-success">Submit</button>
						<button type="button" class="form-control btn btn-danger">Cancel</button>		
					</form>
				</div>
				</div>
		 	</div>
	 	</div> 	

	</div>
 </body>
 </html>