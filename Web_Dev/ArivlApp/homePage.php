<!DOCTYPE html>
<html>
<head>
	<title>HomePage</title>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale=1.0">
	<meta name="author" content="StacksonStacks" >
	<link rel = "stylesheet" type = "text/css" href = "homepage.css"></link>
	<script src = "jquery-3.2.1.js"></script>
	<script src = "./bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./bootstrap-3.3.4-dist/css/bootstrap.min.css"></link>
</head>
<body class = "tyler">
	<div class= "container">
		<div class="row">
			<div class="col-md-6 col md-offset-3">
				<div class="panel panel-login" >
					<div class="panel-heading" >
						<div class="row">
					
							<div class="col-xs-6">
								<a href="resgister.php" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form action="loginPortal.php" method="POST" role="form" style="display: block;">
									<div class = "container">
										<img src="arivl.png" alt="arivl logo" style="height: 10%; width:20%" />

									</div>
					
									<div class="form-group" >
										<label for="uname">
											<b>Username</b>
										</label><br>
										<input  tabindex="1" type="text" name="uname" id="uname" placeholder="Enter username" required class="form-control"><br>
									</div>	
									<div class="form-group">	
										<label for="psw">
											<b>Password</b>
										</label><br>
										<input class="form-control" tabindex="2" type="password" name="psw" id="psw" placeholder="Enter Password" required><br>
									</div>	
										<button type="submit" class ="form-control btn btn-success">
											Login
										</button>
									<div class="form-group text-center">	
										<label for="rem">
											Remember Me
										</label>
										<input tabindex="3" type="checkbox" checked="checked" id="" name="remember">
									</div>
										<button class ="form-control btn btn-danger" type="button" class="cancelbtn">
											Cancel
										</button>
										<span class="psw">
											Forget <a href="#">Password?</a>
												</span>
											
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