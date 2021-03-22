<?php

require_once('includes/config.php');
require_once('includes/classes/FormSanitizer.php');
require_once('includes/classes/Constant.php');
require_once('includes/classes/Account.php');

//
$account = new Account($con);

if (isset($_POST["submitButton"])) {
	$firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
	$lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
	$username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
	$email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
	$email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
	$password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
	$password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);

	//it will return true or false
	// $success = $account->register($firstName, $lastName, $username, $email, $email2, $password, $password2);
	// if ($success) {
		// 	$_SESSION["userLoggedIn"] = $username;
		// 	header("Location: index.php");
		// }
		

	//f3v24 - we create register() in Account.php it will return true or false
	$account->register($firstName, $lastName, $username, $email, $email2, $password, $password2);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./assets/style/style.css">

	<title>Netflix Clone</title>
</head>

<body>
	<div class="signInContainer">

		<div class="column">

			<div class="header">
				<img src="assets/images/logo.png" title="Logo" alt="Site logo">
				<h3>Sign Up</h3>
				<span>to continue to Reeceflix</span>
			</div>

			<form method="POST">



			<?php echo $account->getError(Constants::$firstNameCharacters); ?>
				<!-- <input type="text" name="firstName" placeholder="First Name" value="<?php /* getInputValue("firstName"); */ ?>" required> -->
				<input type="text" name="firstName" placeholder="First Name" required>

			<?php echo $account->getError(Constants::$lastNameCharacters); ?>
				<!-- <input type="text" name="lastName" placeholder="Last Name" value="<?php /* getInputValue("lastName"); */ ?>" required> -->
				<input type="text" name="lastName" placeholder="Last Name" value="" required>

			<?php echo $account->getError(Constants::$usernameCharacters); ?>
			<?php echo $account->getError(Constants::$usernameTaken); ?>
				<!-- <input type="text" name="username" placeholder="Username" value="<?php /* getInputValue("username"); */ ?>" required> -->
				<input type="text" name="username" placeholder="Username" value="" required>

			<?php echo $account->getError(Constants::$emailsDontMatch); ?>
			<?php echo $account->getError(Constants::$emailInvalid); ?>
			<?php echo $account->getError(Constants::$emailTaken); ?>
				<!-- <input type="email" name="email" placeholder="Email" value="<?php /* getInputValue("email"); */ ?>" required> -->
				<input type="email" name="email" placeholder="Email" value="" required>
				<!-- <input type="email" name="email2" placeholder="Confirm email" value="<?php /* getInputValue("email2") */; ?>" required> -->
				<input type="email" name="email2" placeholder="Confirm email" value="" required>

			<?php echo $account->getError(Constants::$passwordsDontMatch); ?>
			<?php echo $account->getError(Constants::$passwordLength); ?>
				<input type="password" name="password" placeholder="Password" required>
				<input type="password" name="password2" placeholder="Confirm password" required>
				<input type="submit" name="submitButton" value="SUBMIT">
			</form>
			<a href="login.php" class="signInMessage">Already have an account? Sign in here!</a>
		</div>

	</div>
</body>

</html>