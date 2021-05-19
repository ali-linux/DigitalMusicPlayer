<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
	include("includes/config.php");
	include("includes/classes/User.php");
	include("includes/classes/Artist.php");
	include("includes/classes/Album.php");
	include("includes/classes/Song.php");
	include("includes/classes/Playlist.php");
	if( $_SESSION['userLoggedIn']){
		if(isset($_GET['userLoggedIn']) ) {
			$userLoggedIn = new User($con, $_GET['userLoggedIn']);
		}
		else {
			echo "Username variable was not passed into page. Check the openPage JS function";
			exit();
		}
	} else {
		header('Location registration.php');
	}
}
else {
  include('includes/layout/header.php');
  include('includes/layout/footer.php');

	$url = $_SERVER['REQUEST_URI'];
	echo "<script>openPage('$url')</script>";
	exit();
}

?>
