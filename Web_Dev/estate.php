<?php 
	session_start();
	include "database.php";
	//echo $_SESSION['name'];
 ?>
 
 <?php
		$query = "SELECT * FROM users WHERE deleted = 0 AND active = 0";
	$result = $conn->query($query);
	if($row=$result->fetch_assoc())
	{	
		echo'<table class="table table-bordered"> <caption>Users</caption>';
		echo "<thead> <tr>";
		echo "<th>Name</th>";
		echo "<th>Surname</th>";
		echo "<th>Phone</th>";
		echo "<th>Residency</th>";
		echo "<th>Active</th>";
	
		echo "</tr></thead>";
		echo "</table>";
?>