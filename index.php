<?php 

require_once('includes/header.php');

// require_once('includes/config.php');
// require_once('includes/classes/PreviewProvider.php');
// require_once('includes/classes/Entity.php');

if (!isset($_SESSION["userLoggedIn"] )) {
	header("Location: register.php");
}

//if the login is success in the login.php
$userLogin = $_SESSION['userLoggedIn'];



$preview = new PreviewProvider($con, $userLogin);

// $entity = new Entity();
// we are not passing ID 
//null muna, later it will change
echo $preview->createPreviewVideo(null);

require_once('./includes/footer.php');
?>
