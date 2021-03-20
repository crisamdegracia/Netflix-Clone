<?php 



?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/style/style.css" />

	<title>Netflix Clone</title>
</head>

<body>
	<div id="inputContainer">
		<form action="register.php" id="loginForm" method="POST">
			<h2>Login to your account</h2>
			<p>
				<label for="loginUsername">Username</label>
				<input type="text" id="loginUsername" name="loginUsername" placeholder="e.g Barack Obama" required>
			</p>
			<p>
				<label for="loginPassword">Password</label>
				<input type="password" id="loginPassword" name="loginPassword" required placeholder="Your Password">
			</p>
			<button type="submit" name="loginButton">Login</button>
		</form>




		<form action="register.php" id="registerForm" method="POST">
			<h2>Create your free account</h2>
			<p>
				<label for="username">Username</label>
				<input type="text" id="username" name="Username" placeholder="e.g Barack Obama" required>
			</p>

			<p>
				<label for="firstname">First Name</label>
				<input type="text" id="firstname" name="firsname" placeholder="e.g Barack Obama" required>
			</p>
			<p>
				<label for="lastname">Last name</label>
				<input type="text" id="lastname" name="lastname" placeholder="e.g Barack Obama" required>
			</p>

			<p>
				<label for="email">Email</label>
				<input type="text" id="email" name="email" placeholder="e.g Barack Obama" required>
			</p>


			<p>
				<label for="email2">Confirm Email</label>
				<input type="text" id="email2" name="email2" placeholder="e.g Barack Obama" required>
			</p>
			<p>
				<label for="password">Password</label>
				<input type="password" id="password" name="password" required placeholder="Your Password">
			</p>
			<p>
				<label for="password2">Confirm Password</label>
				<input type="password" id="password2" name="password2" required placeholder="Your Password">
			</p>
			<button type="submit" name="loginButton">Sign Up</button>
		</form>

	</div>

</body>

</html>