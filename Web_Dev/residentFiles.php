<?php
	/*	$query1 = "SELECT * FROM tbgallery WHERE user_id =$userid";
					$res1 = $mysqli->query($query1);*/
session_start();
	include "database.php";
	$idd = $_SESSION['id'];
	//$mysqli = mysqli_connect("localhost", "root", "", "dbUser");
	$userid = $idd;
				/*	$query1 = "SELECT * FROM gallery WHERE user_id =$userid";
					$res1 =$conn->query($query1);
					echo"<h1>image Gallery</h1>";
					echo"<div class='row imageGallery'>";

					while($row1 = $res1->fetch_assoc())	
					{
						$r=$row1['filename'];

						echo"<div class='col-3' style='background-image: url(files/$r)'>
</div>";
					}
					echo"</div>";	*/
	//echo "number of rows: " . $conn->error;
	
	if(isset($_POST['profile']))
			{
				$filename = $_FILES["fileToUpload"]["name"];
				$qu = "UPDATE gallery SET filename= '$filename' WHERE user_id = '$idd' AND type='image'";
				$rest = $conn->query($qu);
				
				$target_dir = "files/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image
				
					$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
					if($check !== false) {
						///*A easy way to see what happened*/echo "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					} 
					else {
						/*A easy way to see what happened*/echo "File is not an image.<br/>";
						$uploadOk = 0;
					}
					if ($_FILES["fileToUpload"]["size"] > 1000000) {
					/*A easy way to see what happened*/echo "Sorry, your file is too large.<br/>";
					$uploadOk = 0;
					}
				
				
					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "jpeg"&& $imageFileType != "png") 
					{
						/*A easy way to see what happened*/echo "Sorry, only JPG, PNG and JPEG files are allowed.<br/>";
						$uploadOk = 0;
					}
					
					//Finally, check if all the conditions are met to decode whether to upload or not
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) 
					{
						/*A easy way to see what happened*/echo "Sorry, your file was not uploaded.<br/>";
						
					} 
					// If everything is ok, try to upload file
					else 
					{
						if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
						{
							/*A easy way to see what happened*/
							//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
							//move_uploaded_file($_FILES["picToUpload"]["tmp_name"][$key], $target_file);
						} 
						else 
						{
							echo "Sorry, there was an error uploading your file.<br/>";
						}
					
					}
				
			}
	
	if(isset($_POST["files"]))
	{

		$uploadFile = $_FILES["picToUpload"];
				// Profile pic is being updated
				$numFiles = count($uploadFile["name"]);
								$target_dir = "files/";
			for($key = 0; $key < $numFiles; $key++){
								// Use $uploadFile[parameter][index] to access individual files
								// For example: $name = $uploadFile["name"][$i];
								
								//$uploadFile = $_FILES["fileToUpload"];
								$target_file = $target_dir . basename($_FILES["picToUpload"]["name"][$key]);
								$uploadOk = 1;
								$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
								
							
								//$check = getimagesize($_FILES["fileToUpload"]["tmp_name"][]);
								$check =$uploadFile['size'][$key];
								if($check <1000000)
								{
									if($imageFileType != "pdf") 
									{
										//echo "Sorry, only JPG and JPEG files are allowed.<br/>";
										$uploadOk = 0;
									}
									else
									{
										// Allow certain file formats
										move_uploaded_file($_FILES["picToUpload"]["tmp_name"][$key], $target_file);
										
										$file = $uploadFile['name'][$key];
										
										$query = "INSERT INTO gallery (user_id,filename) VALUES ($idd,'$file')";
										$rest = $conn->query($query); 
										//echo "File is an image";
										echo "Love: ".$idd;
									}
							}
				else 
				{
										//echo "File is not an image.";
										$uploadOk = 0;
										
				}
			
				header("location:resident.php");
		}

	}
?>