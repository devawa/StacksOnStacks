<?php 
	session_start();
	include "database.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>
 		Registration
 	</title>
 	<meta charset = "utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale=1.0">
	<link rel = "stylesheet" type = "text/css" href = "homepage.css"></link>
	<script src = "jquery-3.2.1.js"></script>
	<script src = "./bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./bootstrap-3.3.4-dist/css/bootstrap.min.css"></link>
 </head>
 <body>
 	<h1>
 		WELCOME TO REGISTRATION
 	</h1>
 	<div class="container">
		<div class="row">
			<div class="col-md-6 col md-offset-3">
				<div class="panel panel-login">

					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="homePage.php">Return</a>
							</div>
						</div><hr>
					</div>
				<div class="panel-body">
				<div class="row">
				<div class="col-lg-12">
	 				<form method="POST" action="registerUser.php">
	 				<div class = "form-group">
	 					<label for="name">
	 						Name:
	 					</label>
	 					<input type="text" name="name" placeholder="User Name" required class="form-control" tabindex="1"><br>
	 				</div>
	 				<div class = "form-group">
	 					<label for="surname">
	 						Surname:
	 					</label>
		 				<input class="form-control" type="text" name="surname" placeholder="User Surname" required tabindex="2"><br>
		 			</div>
		 			<div class = "form-group">
		 				<label for="id">ID Number:</label>
		 				<input class="form-control" type="text" name="id" placeholder="User ID number" required tabindex="3"><br>
		 			</div>
		 			<div class = "form-group">
		 				<label for="number">Mobile 	Number</label>
			 			<input class="form-control" type="text" name="number" placeholder="User Mobile Number" required tabindex="4"><br>
			 		</div>
			 		<div class = "form-group">
			 			<label for="License">	License Plate</label>
			 			<input class="form-control" type="text" name="license" placeholder="License Plate" required tabindex="5"><br>
			 		</div>
			 		<div class = "form-group">
		  				<label for="email">Email Address</label>
		 				<input class="form-control" type="text" name="email" placeholder="email" required tabindex="6"><br>
		 			</div>
		 			<div class="form-group">
		 				<label for="Estate">
		 					Estate
		 				</label>
		 				<input type="text" class="form-control" name="estate" placeholder="Enter Estate" required tabindex="7">
		 			</div>
			 			<button type="submit" class="form-control btn btn-success">Submit</button>
						<button type="button" class="form-control btn btn-danger">Cancel</button>		
					</form>
				</div>
				</div>
				</div>
				</div>
		 	</div>	
	 	</div> 	
	</div>
 </body>
 </html>