<?php
require_once('./adminFiles.php');
if($_GET['id']){
  $id = $_GET['id'];
  mysqli_query($con, "DELETE FROM users WHERE id='$id'");
  header("Location: adminDashboard.php");
}else{
  header("Location: adminDashboard.php");

}
?>
