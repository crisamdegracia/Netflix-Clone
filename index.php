<?php 

require_once('./includes/header.php');

$preview = new PreviewProvider($con, $userLogin);

// we are not passing ID 
//null muna, later it will change
echo $preview->createPreviewVideo(null);


$containers = new CategoryContainers($con, $userLogin);
echo $containers->showAllCategories();

require_once('includes/footer.php');
?>
