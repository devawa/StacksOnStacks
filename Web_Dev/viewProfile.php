<?php 
	session_start();
	include "database.php";
 ?>

<?php
	$idd = $_SESSION['id'];
	$name = $_SESSION['name']; 
	$pass = $_SESSION['password'];			
						
	$query1 = "SELECT * FROM gallery WHERE user_id =$idd";
	$res1 =$conn->query($query1);
				
	$query = "SELECT * FROM users WHERE user_id = '$idd'";
	$res = $conn->query($query);
	
?>

<div class="row">
    <div class="col s12 m12">
      <div class="card horizontal">
        <div class="card-image">
          <?php 
            $query1 = "SELECT * FROM gallery WHERE user_id =$idd AND type='image'";
            $rest =$conn->query($query1);
            
            if(isset($_POST['submit']))	{
                $filename = $_FILES["fileToUpload"]["name"];
                $qu = "UPDATE tbUsers SET profilePic= '$filename' WHERE email = '$email' AND password = '$pass'";
                mysqli_query($mysqli, $qu);
                    
                $query1 = "SELECT * FROM gallery WHERE user_id =$idd";
                $rest = mysqli_query($mysqli, $query); 
            }
        
            if($row = mysqli_fetch_array($rest))
			{
                echo '<img id="img" class="circle" src="files/profile_user.jpg"/>';
            }
        ?>
          <span class="card-title black-text flow-text"><?php $name = $_SESSION['name']; echo $name;  ?></span>
        </div>
        <div class="card-content">
          <?php 
            if($row = mysqli_fetch_array($res)){
                echo "
                <p class='flow-text'>Name: ". $row['name'] ."</p>
                <p class='flow-text'>Surname: ". $row['surname'] . "</p>
                <p class='flow-text'>Email Address: ".  $row['email'] . "</p>
                <p class='flow-text'>Phone Number: ". $row['number'] ."</p>
                <p class='flow-text'>License Number: ". $row['license'] ."</p>";
	        }
          ?>
        </div>
      </div>
    </div>
</div>