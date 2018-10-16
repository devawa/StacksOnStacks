<?php 
	session_start();
	include "database.php";
 ?>

<?php
	$query = "SELECT * FROM users WHERE deleted = 0 AND active = 0";
	$result = $conn->query($query);
echo '<div class="row">';
    if($result){
       
        
        while($row=$result->fetch_assoc()){
             echo '
            
                <div class="col s12 m4">
                    <div class="card">
                        

                        <div class="card-content">
                            
        ';
			echo "<form action = 'activateUser.php' method = 'POST'>";
			echo "<p>".$row['name']."</p>";
			echo "<p>".$row["surname"]."</p>";
			echo "<p>".$row['number']."</p>";
			$number = $row['number'];
			echo"<input type='hidden' name='number' value='$number'/>";
								
			if($row["resident"] == 1){
				echo "<p>Permanent</p>";
			}else{
				echo "<p>Guest</p>";
            }
            echo ' ';
            echo '<p>
                    <button type="submit" name="activate"><i class="btn green material-icons">check</i></button> ';
            echo '  <a class="waves-effect waves-light btn modal-trigger" href="#file"><i class="btn yellow material-icons">visibility</i></a>';
            echo "<button type='submit' name='deactivate'><i class='btn red material-icons'>delete</i></button>";

            echo ' 
                    </div>
                </div>
            </div>
            ';
            
            $idd = $_SESSION['id'];
			/*echo '<td><button type="submit" name="activate"><i class="btn green material-icons">check</i></button> ';
			echo "<a class='waves-effect waves-light btn modal-trigger' href='#file'><i class='btn yellow material-icons'>visibility</i></a>";*/
			echo "<div id='file' class='modal'>
				<div class='modal-content'>
				<h4>User Information</h4>";
				$query = "SELECT * FROM users WHERE user_id = '$idd'";
				$res = $conn->query($query);
				if($row = mysqli_fetch_array($res)){   
                    echo "<p>Name: ". $row['name'] ."</p>
						<p>Surname: ". $row['surname'] . "</p>
						<p>Email Address: ".  $row['email'] . "</p>
						<p>Phone Number: ". $row['number'] ."</p>
						<p>ID Number: ". $row['idNumber'] ."</p>
						<p>License Number: ". $row['license'] ."</p>";
				}
                
                echo "</div>
					<div class='modal-footer'>
					<a href='#!' class='modal-close waves-effect waves-green btn-flat'>Close</a>
					</div>
					</div>";
                        
                /*echo "<button type='submit' name='deactivate'><i class='btn red material-icons'>delete</i></button>";*/
				echo "</td>";
				echo "</tr></tbody>";
				echo"</form>";
		}
	}
?>
<script>
    $(document).ready(function(){
 
		$('.modal').modal();
    });
</script>