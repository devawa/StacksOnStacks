<?php
	session_start();
	include "database.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Arivl Super User</title>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale=1.0">
	<meta name="author" content="StacksonStacks" >
	<link rel = "stylesheet" type = "text/css" href = "homepage.css">
	<!--link rel="stylesheet" href="./bootstrap-3.3.4-dist/css/bootstrap.min.css"></link-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="cyan darken-3">
	<?php include "nav-bar-logout.php"; ?>
<div class="container">
	<div class="row">
			
				<!--a href = "EstateReg.php" class="btn center white-text">Register Estate </a>
				<a href="RemoveEstate.php" class="btn white-text">Remove Estate</a>
				<a href="" class="btn white-text">Add User</a>
				<a href="" class="btn white-text">Delete User</a-->
			
	</div>
	<div class="row">
    	<div class="col s12">
			<ul class="tabs z-depth-1 cyan darken-2">
				<li class="tab col s3"><a class="active white-text" href="#test1">Register Estate</a></li>
				<li class="tab col s3"><a  href="#test2" class="white-text">Remove Estate</a></li>
				<li class="tab col s3"><a href="#test3" class="white-text">Estate List</a></li>
				<li class="tab col s3"><a href="#test4" class="white-text">Access Log</a></li>
			</ul>
    	</div>
		<div class="row">
			<div id="test1" class="col s12 center">
				<div class="row center">
					<form method="POST"  action="AddEstate.php" role="form" class="col s12 m6 card">
						<h4 class="black-text">Add Estate</h4>
						<div class="row">
							<div class="input-field col s12 m8 offset-m2 white">
								<input type="text" name="Ename" required class="validate" id="Ename">
								<label for="Ename">Estate Name</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m8 offset-m2 white">
								<input id="autocomplete" name="EAddress" onFocus="geolocate()" type="text">
								<label for="autocomplete">Estate Address</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m8 offset-m2 white">
								<input class="validate" type="email" name="email" required  id="email">
								<label for="email">Estate Email Address</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m8 offset-m2 white">
								<button type="submit" class="form-control btn btn-success">Add Estate</button>
							</div>
						</div>
					</form>

					<!--div class="col m5 offset-m1 s12 card">
						<input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text"></input>
						<table id="address">
							<tr>
								<td class="label">Street address</td>
								<td class="slimField"><input class="field" id="street_number"
									disabled="true"></input></td>
								<td class="wideField" colspan="2"><input class="field" id="route" name=""
									disabled="true"></input></td>
							</tr>
							<tr>
								<td class="label">City</td>

								<td class="wideField" colspan="3"><input class="field" id="locality"
									disabled="true"></input></td>
							</tr>
							<tr>
								<td class="label">State</td>
								<td class="slimField"><input class="field"
									id="administrative_area_level_1" disabled="true"></input></td>
								<td class="label">Zip code</td>
								<td class="wideField"><input class="field" id="postal_code"
									disabled="true"></input></td>
							</tr>
							<tr>
								<td class="label">Country</td>
								<td class="wideField" colspan="3"><input class="field"
									id="country" disabled="true"></input></td>
							</tr>
						</table>
					</div-->
				</div>
			</div>
		</div>
		
		<div class="row">
			<div id="test2" class="col s12">
				<div class="row center">
						<form method="POST"  action="RemoveEstate.php" role="form" class="col s12 m6 card">
							<h4 class="black-text">Remove Estate</h4>
							<div class="row">
								<div class="input-field col s12 m8 offset-m2 white">
									<input type="text" name="Ename" required class="validate" id="Ename">
									<label for="Ename">Estate Name</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m8 offset-m2 white">
									<button type="submit" class="btn">Remove Estate</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div id="test3" class="col s12">
<div class="row center">
							<?php
			$query = "SELECT * FROM estates WHERE active = 1";
		$result = $conn->query($query);
					echo'<table class="table table-bordered"> <caption>Estates</caption>';
			echo "<thead> <tr>";
			echo "<th>Name</th>";
			echo "<th>Address</th>";
			echo "<th>Email</th>";
			echo "</tr></thead>";
		while($row=$result->fetch_assoc())
		{	

			
		
			echo "<tr>";
			echo "<td>".$row["estate_name"]."</td>";
			echo "<td>".$row["estate_address"]."</td>";
			echo "<td>".$row["estate_email"]."</td>";
			echo "<tr>";
		}
			echo "</table>";

	?>
						</div>
			</div>
		</div>
		
		<div class="row">
			<div id="test4" class="col s12">
<div class="row center">
							<?php
			$query = "SELECT * FROM history ";
		$result = $conn->query($query);
					echo'<table class="table table-bordered"> <caption>Estates</caption>';
			echo "<thead> <tr>";
			echo "<th>Name</th>";
			echo "<th>Time</th>";
			echo "</tr></thead>";
			
			
		while($row=$result->fetch_assoc())
		{	

			
		
			echo "<tr>";
			echo "<td>".$row["user_id"]."</td>";
			echo "<td>".$row["access"]."</td>";
			echo "<tr>";
		}
			echo "</table>";

	?>
						</div>
			</div>
		</div>
  </div>
</div>





<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
<script>
	$(document).ready(function(){
    $('.tabs').tabs();
  });
</script>
<script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAtGH16xYe--R1RL_A9VwiuNiYJUcCg4s&libraries=places&callback=initAutocomplete"></script>
</body>
</html>