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
	<link rel = "stylesheet" type = "text/css" href = "css/styles.css"></link>
	<script src = "jquery-3.2.1.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
    <form action="homeRes.php" method="POST">
      
      <button class="btn" type="submit">Logout</button>
    </form>
  </div>
</nav>
 
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
								<a href="homeRes.php">Return</a>
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
		 				<label for="number">Mobile 	Number:</label>
			 			<input class="form-control" type="text" name="number" placeholder="User Mobile Number" required tabindex="4"><br>
			 		</div>
			 		<div class = "form-group">
			 			<label for="License">	License Plate:</label>
			 			<input class="form-control" type="text" name="license" placeholder="License Plate" required tabindex="5"><br>
			 		</div>
			 		<div class = "form-group">
		  				<label for="email">Email Address:</label>
		 				<input class="form-control" type="text" name="email" placeholder="Email" required tabindex="6"><br>
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