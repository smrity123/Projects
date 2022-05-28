<?php 


	session_start();


	require_once('functions.php');

	if(!logged_in()){
		header('location: index.php');
	}


	if(isset($_POST['chatupdate'])){

		$email = $_SESSION['email'];

		$message = $_POST['message'];

		$insert = $connection->query("INSERT INTO conversation(email, message) VALUES('$email', '$message')");

		die();

	}


	if(isset($_POST['updatehobe'])){


				$messages = $connection->query("SELECT * FROM conversation");


				while($rows = mysqli_fetch_assoc($messages)){

					$em = $rows['email'];

					$query = mysqli_query($connection, "SELECT * FROM users WHERE email = '$em'");

					$queryvalue = mysqli_fetch_assoc($query);

					echo '<p><span class="fullname">'.$queryvalue['firstname'].' '.$queryvalue['lastname'].':</span> '.'</p>';
					echo '<p><span class="msg">'.$rows['message'].'</p>';

				}

				die();
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chatroom</title>
	<style type="text/css">
		body{
			margin: 0;
			overflow:hidden;
			background-image: url('image/bg.jpg');
			background-repeat: no repeat;
		}
		#messages {
			
			overflow-x: hidden;
			padding: 10px;
			
		}
		.p {
			color: white;
			font-size: 20px;
		}
		.p a {
			text-decoration: none;
		}
		.p a:hover {
			color: white;
		}
		.msg {
			color: #b2bec3;
		}
		form {
			display: flex;
		}
		input {
			font-size: 1.2rem;
			padding: 10px;
			margin: 10px 5px;
			appearance: none;
			-webkit-appearance: none;
			border: 1px solid #ccc;
			border-radius: 5px;
		}
		.fullname {
			color: white;
			font-weight: bold;
		}
		#message {
			flex: 2;
		}
	</style>
	
</head>
<body>
	

	<div class="chat box">
		<p align="right" class="p">Hi - <?php echo $_SESSION['email']; ?> - <a href="logout.php">Logout</a></p>

		<div class="squarebox" id="messages">


				
			
		</div>
		<form action="" method="POST" class="sendmessage">
			<input placeholder="type something" class="amader-input message" type="text" name="message" id="message">
			<input type="submit" value="Send" name="send">
		</form>
	</div>

	<script src="js/jquery.js"></script>
	<script src="js/scripts.js"></script>


</body>
</html>