<?php
require_once('./adminFiles.php');
if($_GET['id']){
  $id = $_GET['id'];
  mysqli_query($con, "DELETE FROM artists WHERE id='$id'");
  header("Location: artistAdmin.php");
}else{
  header("Location: artistAdmin.php");

}
?>
