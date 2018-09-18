<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="StacksonStacks">
    <link rel = "stylesheet" type = "text/css" href = "css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="icon" type="image/png" href="Images/logo.jpg" />
	<title>Arivl | Home</title>
</head>
<body>
<?php include "nav-bar.php" ?>
<br/>
<div class="container">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<div class="row">
					<div class="col-md-4 col-4">
					</div>
					<div class="col-md-4 col-4">
						<i class="large material-icons">android</i>
						<p>ArivlApp gives access to authorized users at registered boom gates.  A user needs to be registered in order to gain access to certain gates. The user logs in using their phone number and password only once. The user needs to enable their bluetooth to ensure that the boom gate opens when in close proximity.</p>
					</div>
					<div class="col-md-4 col-4">
					</div>
				</div>
			</div>
	
			<div class="item">
				<div class="row">
					<div class="col-md-4 col-4">
					</div>
					<div class="col-md-4 col-4">
						<i class="large material-icons">bluetooth</i>
						<p>What the Arivl application entails is the ability to open homes, malls, and work with the swipe on a phone using native mobile technologies like Bluetooth LE. Once Bluetooth is activated or BLE is enabled, your Arivl device will search for the closest boom. On the boom is an ArivlBox and when the phone connects to the box, then the user has to swipe the phone.</p>
					</div>
					<div class="col-md-4 col-4">
					</div>
				</div>
			</div>
    
			<div class="item">
				<div class="row">
					<div class="col-md-4 col-4">
					</div>
					<div class="col-md-4 col-4">
						<i class="large material-icons">directions_car</i>
						<p> It's ability to log the access data also provides for the ability for the admin to do further data analytics with regards to registered users access and exit times.</p>
					</div>
					<div class="col-md-4 col-4">
					</div>
				</div>
			</div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<!--div class="carousel carousel-slider center">
    <div class="carousel-fixed-item center">
      <a class="btn waves-effect white teal lighten-2">button</a>
    </div>
    <div class="carousel-item teal lighten-4 black-text center" href="#one!">
      <h2>Easy Login</h2>
      <p class="black-text"><i class="large material-icons">android</i><p>ArivlApp gives access to authorized users at registered boom gates.  A user needs to be registered in order to gain access to certain gates. The user logs in using their phone number and password only once. The user needs to enable their bluetooth to ensure that the boom gate opens when in close proximity.</p>
    </div>
    <div class="carousel-item teal lighten-4 black-text" href="#two!">
      <h2>Enable Bluetooth</h2>
      <p class="black-text"><i class="large material-icons">bluetooth</i><p>What the Arivl application entails is the ability to open homes, malls, and work with the swipe on a phone using native mobile technologies like Bluetooth LE. Once Bluetooth is activated or BLE is enabled, your Arivl device will search for the closest boom. On the boom is an ArivlBox and when the phone connects to the box, then the user has to swipe the phone.</p>
    </div>
    <div class="carousel-item teal lighten-4 black-text" href="#three!">
      <h2>Simple to use</h2>
      <p class="black-text"><i class="large material-icons">directions_car</i><p> It's ability to log the access data also provides for the ability for the admin to do further data analytics with regards to registered users access and exit times.</p>
    </div>
  </div-->

<!--div class="container">
    <div class="row">
        <div class=" carousel">
            <a class="carousel-item" href="#one!"><i class="large material-icons">android</i><p>ArivlApp gives access to authorized users at registered boom gates.  A user needs to be registered in order to gain access to certain gates. The user logs in using their phone number and password only once. The user needs to enable their bluetooth to ensure that the boom gate opens when in close proximity.</p></a>
            <a class="carousel-item" href="#two!"><i class="large material-icons">bluetooth</i><p>What the Arivl application entails is the ability to open homes, malls, and work with the swipe on a phone using native mobile technologies like Bluetooth LE. Once Bluetooth is activated or BLE is enabled, your Arivl device will search for the closest boom. On the boom is an ArivlBox and when the phone connects to the box, then the user has to swipe the phone.</p></a>
            <a class="carousel-item" href="#three!"><i class="large material-icons">directions_car</i><p> It's ability to log the access data also provides for the ability for the admin to do further data analytics with regards to registered users access and exit times.</p></a>
        </div>
    </div>

    
</div-->

<br/>

<?php include "footer.php" ?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
<script>
  $(document).ready(function(){
   /* $('.carousel').carousel();

  
  $('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true
  }); */ });
	/*$(document).ready(function(){
        $('.carousel').carousel();

        $('.carousel.carousel-slider').carousel({
            fullWidth: true
        });
    });*/
</script>
</body>
</html>