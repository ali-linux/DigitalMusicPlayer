<?php
require_once('./adminFiles.php');
if($_GET['id']){
  $id = $_GET['id'];
  mysqli_query($con, "DELETE FROM songs WHERE id='$id'");
  header("Location: songAdmin.php");
}else{
  header("Location: songAdmin.php");

}
?>
