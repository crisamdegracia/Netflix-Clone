<?php 
require_once('includes/header.php');

$userLogin = $_SESSION['userLoggedIn'];

if (!isset($_GET["id"])) {
    ErrorMessage::show("No ID passed into page.");
}

// ung ID from the main entity will be stored here
// by passing an ID, hindi na sya mag rarandom everytime it refresh
$entityId = $_GET["id"];
$entity = new Entity($con, $entityId);


$preview = new PreviewProvider($con, $userLoggedIn);
echo $preview->createPreviewVideo($entity);


echo $userLoggedIn;
$seasonProvider = new SeasonProvider($con, $userLoggedIn);
echo $seasonProvider->create($entity);



?>
