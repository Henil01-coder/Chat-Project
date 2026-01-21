<?php
	session_start();
	include_once "config.php";

	$outgoing_id = $_SESSION['unique_id'];

	$sql = "SELECT * from users where NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";

	$query = mysqli_query($conn, $sql);

	$output = "";
	
	if (mysqli_num_rows($query) == 0) {
		$output .= "No user are available";
	}
	else{
		include_once "data.php";
	}
	echo $output;
?>