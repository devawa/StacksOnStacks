<!DOCTYPE html>
<html>
<head>
	<title>Arivl Login</title>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale=1.0">
	<meta name="author" content="StacksonStacks" >
	<link rel = "stylesheet" type = "text/css" href = "css/styles.css">
	<!--link rel="stylesheet" href="./bootstrap-3.3.4-dist/css/bootstrap.min.css"></link-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	<script src="https://cdn.firebase.com/libs/firebaseui/3.3.0/firebaseui.js"></script>
	<link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.3.0/firebaseui.css" />
	<link rel="icon" type="image/png" href="Images/logo.jpg" />
    
</head>
<body class="cyan darken-3">
	<?php include "nav-bar.php";?>
	<div class="container ">
	<h3>Arivl Login</h3>
		<div class="row">
		
		<form action="loginPortal.php" method="POST" role="form" class="col s12 m6 card">
				<div class="row">
					<div class="input-field col s12 m8 offset-m2">
						<input id="uname" name="uname" type="text" class="validate">
						<label for="uname">Username</label>
					</div>
					<!--div class="input-field col s8">

					</div-->
				</div>
				<div class="row">
					<div class="input-field col s12 m8 offset-m2">
						<input id="psw" name="psw" type="password" class="validate">
						<label for="psw">Password</label>
					</div>
					<!--div class="input-field col s8">

					</div-->
				</div>
				<div class="row">
					<div class="input-field col s6 m8 offset-m2">
						<!--a class="col s12 waves-effect waves-light btn green darken-2" type="submit"><i class="material-icons right">send</i>Login</a-->

						<!--input type="submit" class="col s12 waves-effect waves-light btn green darken-2 white-text btn" value="Login"-->
						<button type="submit" class ="btn">
							Login
						</button>
					</div>
					<div class="input-field s6 offset-m2">
					<a href="register.php" class="cyan-text">Sign UP<a>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 center">
						<p>
							<label>
								<input id="indeterminate-checkbox" type="checkbox" />
								<span>Remember Me</span>
							</label>
						</p>
						<p>
							<a href="#">Forgot Password</a>
						</p>
					</div>
				</div>
			</form>
		</div>
	</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

</body>
</html>