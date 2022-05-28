<?php 

	require_once('functions.php');

	session_start();


	if(logged_in()){
		header('location: chat.php');
	}



	if(isset($_POST['register'])){


		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);

		$emailase = $connection->query("SELECT * FROM users WHERE email = '$email'");

		if(mysqli_num_rows($emailase) >= 1) {
			echo "email already exits! try again";
		}else{

			$query = $connection->query("INSERT INTO users (firstname, lastname, email, password) VALUES('$firstname', '$lastname', '$email', '$password')");

			if($query){
				echo "You have been registered Successfully!";
			}
			
		}

		

		

		die();
	}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="box">
		<h2 class="heading">Create an Account</h2>
		<form action="" method="POST" class="userregistration">
			<input class="amader-input" type="text" placeholder="First Name" name="first_name">
			<input class="amader-input" type="text" placeholder="Last Name" name="last_name">
			<input class="amader-input" type="email" placeholder="Email Address" name="email">
			<input class="amader-input" type="password" placeholder="Password" name="password">

			<input type="submit" value="Register" name="registration">
		</form>

		<p class="success"></p>

		Already Have an account? <a class="login" href="login.php">please log in</a>
	</div>



	<script src="js/jquery.js"></script>
	<script src="js/scripts.js"></script>
	
</body>
</html>