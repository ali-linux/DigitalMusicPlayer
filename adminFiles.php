<?php
include("includes/config.php");
include("includes/classes/User.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Song.php");
include("includes/classes/Playlist.php");
include("includes/layout/adminHeader.php");
if($_SESSION['userLoggedIn']){
    $userLoggedIn = new User($con, $_SESSION['userLoggedIn']);
    if($userLoggedIn->isAdmin()){

   } else{
    header('Location: index.php');
  }
  }
 else {
  header('Location registration.php');
}
?>
