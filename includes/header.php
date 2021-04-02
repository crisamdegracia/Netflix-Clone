<?php 

require_once('includes/config.php');
require_once('includes/classes/PreviewProvider.php');
require_once('includes/classes/CategoryContainers.php');
require_once('includes/classes/Entity.php');
require_once('includes/classes/EntityProvider.php');

if (!isset($_SESSION["userLoggedIn"] )) {
	header("Location: register.php");
}

//if the login is success in the login.php
$userLogin = $_SESSION['userLoggedIn'];

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/style/style.css" />
	<script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
        </script>
	<script src="https://kit.fontawesome.com/4764ec3777.js" crossorigin="anonymous"></script> 
	<script src="assets/js/script.js"></script>
	
	<title>Netflix Clone</title>
</head>
<body>
	<div class="wrapper">
	

