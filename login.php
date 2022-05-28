<?php 

	session_start();

	require_once('functions.php');


	if(logged_in()){
		header('location: chat.php');
	}

	if(isset($_POST['login'])){
		
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = $connection->query("SELECT * FROM users WHERE email = '$email'");

		$fetch = mysqli_fetch_assoc($query);

		$pass = $fetch['password'];
		$firstname = $fetch['firstname'];
		$lastname = $fetch['lastname'];

		if( $pass == md5($password) ){
			$_SESSION['login'] = 'successfull';

			$_SESSION['firstname'] = $firstname;
			$_SESSION['lastname'] = $lastname;
			$_SESSION['email'] = $email;

			header('location: chat.php');
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
		<h2 class="heading">Log in</h2>
		<form action="" method="POST" class="userlogin">
			<input class="amader-input" type="email" placeholder="Email Address" name="email">
			<input class="amader-input" type="password" placeholder="Password" name="password">

			<input type="submit" value="Login" name="login">
		</form>

		Don't have an account, <a class="registration" href="register.php">Register Now</a> <br>
	</div>




	<script src="js/jquery.js"></script>
	<script src="js/scripts.js"></script>
	
</body>
</html>