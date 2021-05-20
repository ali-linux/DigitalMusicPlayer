<?php
require_once('./adminFiles.php');
if($_GET['genre']){
  $genre = $_GET['genre'];
  mysqli_query($con, "INSERT INTO genres VALUES('','$genre')");
  header("Location: genreAdmin.php");
}else{
  header("Location: genreAdmin.php");

}
?>
