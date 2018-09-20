<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="StacksonStacks">
    <link rel="icon" href="images/logo.png">
    <link rel = "stylesheet" type = "text/css" href = "homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Arivl | Sign up</title>
</head>
<body class=" cyan darken-3">
<?php $page = 'index'; include "nav-bar.php" ?>
	<div class="container ">
		<div class="row">
			<form action="loginPortal.php" method="POST" role="form" class="col s12 m6 card">
				<h2 class="center">Sign Up</h2>
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
					<div class="input-field col s12 m8 offset-m2">
						<!--a class="col s12 waves-effect waves-light btn green darken-2" type="submit"><i class="material-icons right">send</i>Login</a-->

						<!--input type="submit" class="col s12 waves-effect waves-light btn green darken-2 white-text btn" value="Login"-->
						<button type="submit" class ="btn">
							Login
						</button>
					</div>
					<div class="input-field col s12 center">
						<p>
							<a href="register.php" class="cyan-text">Don't have an account? Sign up here</a>
						</p>
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
<?php include "footer.php" ?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
        $('.carousel').carousel();

        $('.carousel.carousel-slider').carousel({
            fullWidth: true
        });


        $('.slider').slider();

    });
</script>
</body>
</html>