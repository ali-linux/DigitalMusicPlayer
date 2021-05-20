<?php
require_once('./adminFiles.php');
if(isset($_POST['artist'])){
  // echo $_POST['artist'];
  $value = $_POST['artist'];
  $artistId = $_GET['id'];
  mysqli_query($con, "UPDATE artists SET name='$value' WHERE id='$artistId'");
  header("Location: artistAdmin.php");
} 
?>
<form action = <?php echo 'updateArtist.php?id='.$_GET['id']?> method="POST" class="form">
<?php 
  if($_GET['id']){
    $id = $_GET['id'];
    $query = mysqli_query($con, "SELECT name FROM artists WHERE id='$id'");
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
      echo '
      <label for="name">Name</label>
      <input type="text" name="artist" value= '.$result[0]['name'].'>
      <br>
      <input type="submit" value="update artist" class="btn btn-primary">
      ';
  }else{
    header("Location: artistAdmin.php");
  
  }
?>
</form>
