<?php
require_once('./adminFiles.php');
if($_GET['artist']){
  $artist = $_GET['artist'];
  mysqli_query($con, "INSERT INTO artists VALUES('','$artist')");
  header("Location: artistAdmin.php");
}else{
  header("Location: artistAdmin.php");

}
?>
