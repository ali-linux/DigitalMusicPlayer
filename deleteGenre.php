<?php
require_once('./adminFiles.php');
if($_GET['id']){
  $id = $_GET['id'];
  mysqli_query($con, "DELETE FROM genres WHERE id='$id'");
  header("Location: genreAdmin.php");
}else{
  header("Location: genreAdmin.php");

}
?>
