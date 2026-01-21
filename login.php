<?php

	session_start();
	if(isset($_SESSION['unique_id'])){
		header("location: users.php");
	}
?>

<?php
	include_once "header.php";
?>

<body>
	<div class="wrapper">
		<section class="form login">
			<header>RealTime chatting website</header>
			
			<form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
				<div class="error-text"></div>

				<div class="field input">
					<label>Email :</label>
					<input type="text" name="email" placeholder="Enter Email" required>
				</div>

				<div class="field input">  
					<label>Password :</label>
					<input type="password" name="password" placeholder="Enter Password" required>
					<i class="fas fa-eye"></i>
				</div>

				<div class="field button">
					<input type="submit" name="submit" value="continue to chat">
				</div>

			</form>
			<div class="link">Not yet signed up ?<a href="index.php">signup now</a> </div>
		</section>
	</div>

	<script type="text/javascript" src="js/pass-show-hide.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
</body>
</html>