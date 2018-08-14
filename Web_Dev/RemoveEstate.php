<?php
	session_start();
	include "database.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Remove Estate</title>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale=1.0">
	<link rel = "stylesheet" type = "text/css" href = "homepage.css"></link>
	<script src = "jquery-3.2.1.js"></script>
	<script src = "./bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./bootstrap-3.3.4-dist/css/bootstrap.min.css"></link>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col md-offset-3">
				<div class="panel panel-login">
				<div class="panel-body">
				<div class="row">
				<div class="col-lg-12">
	 				<form method="POST" action="Remove.php">
	 				<div class = "form-group">
	 					<label for="Ename">
	 						Estate Name
	 					</label>
	 					<input type="text" name="Ename" placeholder="User Name" required class="form-control" tabindex="1" id="Ename"><br>
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