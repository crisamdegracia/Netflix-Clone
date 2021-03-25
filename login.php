<?php 

// require_once('includes/header.php');
require_once('./includes/config.php');
require_once('./includes/classes/FormSanitizer.php');
require_once('./includes/classes/Account.php');
require_once('./includes/classes/Constant.php');


$account = new Account($con);
if (isset($_POST["submitButton"])) {
	$username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
	$password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
	//it will return true or false
	$success = $account->login($username, $password);
	
	//if the register has no error, then we create userLoggedIn 
	if ($success) {
		$_SESSION["userLoggedIn"] = $username;
		header("Location: index.php");

    }


	//f3v24 - we create register() in Account.php it will return true or false
	//OLD $account->register($firstName, $lastName, $username, $email, $email2, $password, $password2);


}

function getInputValue($name) { 

    if(isset($_POST[$name])){
      echo $_POST[$name];
    }
 }

?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Welcome to Reeceflix!</title>
    <link rel="stylesheet" type="text/css" href="assets/style/style.css" />
</head>
<body>
    <div class="signInContainer">
    <div class="column">
        <div class="header">
        <img src="assets/images/logo.png" title="Logo" alt="Site logo">
        <h3>Sign In</h3>
        <span>to continue to Reeceflix</span>
        </div>
        <form method="POST">
        <?php echo $account->getError(Constants::$loginFailed); ?>
        <?php echo $account->getError(Constants::$loginSuccessful); ?>
        <input type="text" name="username" placeholder="Username" value='<?php echo getInputValue("username"); ?>' required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="submitButton" value="SUBMIT">
        </form>
        <a href="register.php" class="signInMessage">Need an account? Sign in here</a>
    </div>
    </div>
</body>
</html>
