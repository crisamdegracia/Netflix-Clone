<?php 

require_once('includes/config.php');

if (!isset($_SESSION["userLoggedIn"] )) {
	header("Location: register.php");
}


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
	 <h1>WELCOME BEEK!</h1>
</body>

</html>