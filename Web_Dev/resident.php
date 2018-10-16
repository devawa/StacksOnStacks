<?php 
	session_start();
	include "database.php";
	//echo $_SESSION['name'];

 ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="StacksonStacks">
    <link rel="icon" href="images/logo.png">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link rel="stylesheet" href="style.css">

	<title>Welcome <?php echo $_SESSION['name']; ?></title>
</head>

<body class="cyan darken-3">
	<?php include "nav-bar-logout.php"; include "side-nav-resident.php"; ?>

	<div class="container">
		<div class="row" id="welcome">
			<div class="col s12 m12">
				<h3 class="white-text">Welcome <?php echo $_SESSION['name']; ?>, to the Arivl Residential Portal</h3>
				<p class="flow-text white-text">
					Here are some interesting facts!
				</p>
			</div>
		</div>

		<div class="row content-main">
			<div id="viewProfile"></div>
			<div id="editProfile"></div>
			<div id="verifyUser"></div>
			<div id="pendingUsers"></div>
			<div id="viewUsers"></div>
			<div id="removeUser"></div>
		</div>

	</div>




<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
        $('.slider').slider();
        $('.fixed-action-btn').floatingActionButton();
		$('.collapsible').collapsible();
    });
</script>
<script>
	$(document).ready(function(){
    $("#viewProfilebtn").click(function(){
        $("#viewProfile").load("viewProfile.php", function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success")
				$('#welcome').css('visibility', 'hidden');
            if(statusTxt == "error")
                alert("Error: " + xhr.status + ": " + xhr.statusText);
        });
    });

	$("#editProfilebtn").click(function(){
        $("#viewProfile").load("editProfile.php", function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success")
				$('#welcome').css('visibility', 'hidden');
            if(statusTxt == "error")
                alert("Error: " + xhr.status + ": " + xhr.statusText);
        });
    });

	$("#addUserbtn").click(function(){
        $("#viewProfile").load("addUser.php", function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#welcome').css('visibility', 'hidden');
			}
            if(statusTxt == "error")
                alert("Error: " + xhr.status + ": " + xhr.statusText);
        });
    });

	$("#addGuestbtn").click(function(){
        $("#viewProfile").load("addGuest.php", function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success")
				$('#welcome').css('visibility', 'hidden');
            if(statusTxt == "error")
                alert("Error: " + xhr.status + ": " + xhr.statusText);
        });
    });

	$("#addVehiclebtn").click(function(){
        $("#viewProfile").load("addVehicle.php", function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success")
				$('#welcome').css('visibility', 'hidden');
            if(statusTxt == "error")
                alert("Error: " + xhr.status + ": " + xhr.statusText);
        });
    });

	$("#deleteUserbtn").click(function(){
        $("#viewProfile").load("deleteUser.php", function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success")
				$('#welcome').css('visibility', 'hidden');
            if(statusTxt == "error")
                alert("Error: " + xhr.status + ": " + xhr.statusText);
        });
    });
});
</script>
</body>
</html>