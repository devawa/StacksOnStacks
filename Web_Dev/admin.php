<?php 
	session_start();
	include "database.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Admin Portal</title>
 	<meta charset = "utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale=1.0">
	<link rel = "stylesheet" type = "text/css" href = "homepage.css"></link>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 </head>
<body class="cyan darken-3">
	<?php include "nav-bar-logout.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col s12 m12">
				<h3 class="white-text">Welcome to Arivl Admin Portal</h3>
				<!--h2>HELLO <?php /*echo $_SESSION['name']; */?>!</h2-->
			</div>
		</div>

		<div class="row">
			<?php
				$query = "SELECT * FROM users WHERE deleted = 0 AND active = 0";
				$result = $conn->query($query);
				if($result){
					echo'<table class="striped highlight white-text">'; 
					echo '<caption class="white-text flow-text">Users</caption>';
					echo "<thead><tr>";
					echo "<th>Name</th>";
					echo "<th>Surname</th>";
					echo "<th>Phone</th>";
					echo "<th>Residency</th>";
					echo "<th>Active</th>";
					echo "</tr></thead>";

					while($row=$result->fetch_assoc()){
						echo "<form action = 'activateUser.php' method = 'POST'>";
						echo "<tr>";
						echo "<td>".$row["name"]."</td>";
						echo "<td>".$row["surname"]."</td>";
						echo "<td><input type = 'text' name = 'number' value = '".$row['number']. "'></td>";
						echo "<td>";
						if($row["resident"] == 1){
							echo "Permanent";
						}else{
							echo "Guest";
						}
						echo "</td>";
						echo "<td>";
						if($row["active"] == 0){
							echo "<button type='submit'>No</button>";
						}else{
							echo "Yes";
						}
						echo "</td>";
						echo"</tr>";
						echo"</form>";

						if(isset($_POST['$count'])){
							$id=$row["name"];
							echo "HEYY".$row["name"]. '   ';
							$sql = "UPDATE users SET active = 0 WHERE name= '$id'";
							$res = $conn->query($sql);
							if($res == FALSE){
								echo"No data selected";
							}
						}
					}
					echo "</table>";
				}
			?>
		</div>
	</div>
</body>



<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
</html>