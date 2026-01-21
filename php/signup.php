<?php

	session_start();
	
	include_once "config.php";

	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password))
	{

		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$sql = mysqli_query($conn,"SELECT * from users where email = '{$email}'");
			if(mysqli_num_rows($sql) > 0 ){
				echo "$email - This email already exist!!";
			}
			else{
				if (isset($_FILES['image'])) {
					$img_nm = $_FILES['image']['name'];
					$img_type = $_FILES['image']['type'];
					$tmp_nm = $_FILES['image']['tmp_name'];

					$img_explode = explode('.', $img_nm);
					$img_ext = end($img_explode);
					$extension = ["jpeg","png","jpg"];

					if(in_array($img_ext, $extension) == true){

						$type = ["image/jpeg", "image/png", "image/jpg"];
						if(in_array($img_type, $type) === true){

							$time = time();
							$new_image_name = $time.$img_nm;

							if(move_uploaded_file($tmp_nm, "images/".$new_image_name)){
								$ran_id = rand(time(), 100000000);
								$status = "Online";
								$encrypt_pass = md5($password);

								$ins_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status) values({$ran_id}, '{$fname}', '{$lname}', '{$email}', '{$encrypt_pass}', '{$new_image_name}', '{$status}')"); 
							
								if($ins_query){
									$select_sql2 = mysqli_query($conn, "SELECT * from users where email = '{$email}'");
									if(mysqli_num_rows($select_sql2) > 0){
										$res = mysqli_fetch_assoc($select_sql2);
										$_SESSION['unique_id'] = $res['unique_id'];
										echo "success";
									}
									else{
										echo "This email address doesn't exist";
									}
								}
								else{
									echo "something went wrong, please try again!!";
								}
							}
						}
						else{
							echo "please upload an image file - jpeg, png, jpg";
						}
					}
					else{
						echo "please upload an image file - jpeg, png, jpg";
					}
				}
			}
		}
		else{
			echo "$email is not valid";
		}

	}
	else
	{
		echo "All info all required";
	}

?>