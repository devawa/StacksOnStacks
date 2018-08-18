<?php
	$host="localhost";
	$username="root";
	$password="";
	// Create a new connection and select database
	$connection=new mysqli($host, $username, $password);
	// Check if connected
	// Might fail if password is incorrect, server is unreachable, etc
       if($connection->connect_error)
	die("Connection failure: ".$connection->connect_error);
	else
	{
	$connection->select_db("arivldb");
	//echo"Connection success";
	echo "<br><br>";

	}
	
	function sanitise_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}
    
	
	$query = "SELECT * FROM `users`";
	$result = $connection->query($query);
	if($result)
	{	
		echo "<table style= 'border: 1px solid white;border-collapse: collapse;width: 100%;background-color:#ffffcc;' > <caption> Registered Users</caption>";
		echo "<thead> <tr>";
		echo "<th style='border: 1px solid black;text-align:center'>Name</th>";
		echo "<th style='border: 1px solid black;text-align:center'>Surname</th>";
		echo "<th style='border: 1px solid black;text-align:center'>Phone</th>";
		echo "<th style='border: 1px solid black;text-align:center'>password</th>";
		echo "<th style='border: 1px solid black;text-align:center'>Residentcy</th>";
		echo "<th style='border: 1px solid black;text-align:center'>Active</th>";
		echo "</tr></thead>";

		while($row=$result->fetch_assoc()){
			echo "<tr>";
			echo "<td style='border: 1px solid black;text-align:center'>".$row["name"]."</td>";
			echo "<td style='border: 1px solid black;text-align:center'>".$row["surname"]."</td>";
			echo "<td style='border: 1px solid black;text-align:center'>".$row["phone"]."</td>";
			echo "<td style='border: 1px solid black;text-align:center'>".$row["password"]."</td>";
			echo "<td style='border: 1px solid black;text-align:center'>";
			if($row["resident"] == 1){
				echo "Permanent";
			}else{
				echo "Guest";
			}
			echo "</td>";
						echo "<td style='border: 1px solid black;text-align:center'>";
			if($row["active"] == 1){
				echo "Yes";
			}else{
				echo "No";
			}
			echo "</td></tr>";
			
			
		}
		echo "</table>";
	}
	 echo "<a href='welcome.html'>Back<a>";
	 
?>
