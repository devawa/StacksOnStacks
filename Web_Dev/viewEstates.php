<?php
	session_start();
	include "database.php";
?>
        
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
						echo "<th>Number of Users</th>";
						echo "</tr></thead>";
					while($row=$result->fetch_assoc())
					{	
						echo "<tr>";
						echo "<td>".$row["estate_name"]."</td>";
						echo "<td>".$row["estate_address"]."</td>";
						echo "<td>".$row["estate_email"]."</td>";
						
						//number of estates
						$estate = $row["estate_name"];
						$query1 = "SELECT COUNT(*) FROM privileges WHERE estate = '$estate'";
						$result1 = $conn->query($query1);
						echo "<td>";
						if($row1 = mysqli_fetch_array($result1)){
						echo "".$row1[0];}
						echo "</td>";
						echo "<tr>";
						
						
					}
					echo "</table>";
					
			
				?>
				
			</div>
		</div>