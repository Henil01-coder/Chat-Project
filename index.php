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
		<section class="form signup">
			<header>RealTime chatting website</header>
			<form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
				<div class="error-text"></div>
				
				<div class="name-details">
					<div class="field input">
						<label> First Name </label>
						<input type="text" name="fname" placeholder="First Name" required>
					</div>
					<div class="field input">
						<label> last Name </label>
						<input type="text" name="lname" placeholder="Last Name" required>
					</div>
				</div>

				<div class="field input">
					<label>Email</label>
					<input type="text" name="email" placeholder="Enter Email" required>
				</div>

				<div class="field input">
					<label>Password</label>
					<input type="Password" name="password" placeholder="Enter Password" required>
					<i class="fas fa-eye"></i>
				</div>
			
				<div class="field image">
					<label>Profile image</label>
					<input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
				</div>

				<div class="field button">
					<input type="submit" name="submit" value="continue to chat">
				</div>


			</form>

			<div class="link">ALready signed up? <a href="login.php">Login now </a></div>
		</section>
	</div>

	<script type="text/javascript" src="js/pass-show-hide.js"></script>
	<script type="text/javascript" src="js/signup.js"></script>

</body>
</html>