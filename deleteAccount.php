<?php
// include("includes/includedFiles.php");
include("./includes/config.php");
if(isset($_SESSION['userLoggedIn'])){
	$userLoggedIn = $_SESSION['userLoggedIn'];
  // echo $userLoggedIn;
  mysqli_query($con,"DELETE FROM users WHERE username='$userLoggedIn'");
  session_destroy();
	header('Location registration.php');
  die();
} else {
	header('Location registration.php');
}
?>
