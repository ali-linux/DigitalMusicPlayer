<?php
require_once('./adminFiles.php');
if($_GET['id']){
  $id = $_GET['id'];
  mysqli_query($con, "DELETE FROM album WHERE id='$id'");
  header("Location: albumAdmin.php");
}else{
  header("Location: albumAdmin.php");

}
?>
