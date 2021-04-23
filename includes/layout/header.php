<?php
  include("includes/config.php");
  include("includes/classes/Artist.php");  
  include("includes/classes/Album.php");  
  include("includes/classes/Song.php");

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
	<script src="assets/js/script.js"></script>
	<title>Welcome to Kurdify!</title>
</head>
<body>
<div id="mainContainer">
	<div id="topContainer">
		<?php include("includes/layout/navbar.php") ?>
	</div>
<div id="mainViewContainer">
<div id="main">
<?php 
  if(isset($_SESSION['userLoggedIn'])){
		$userLoggedIn = $_SESSION['userLoggedIn'];
    echo "<script>userLoggedIn = '$userLoggedIn'</script>";
	} else{
		header("Location: registration.php");
	}
?>
