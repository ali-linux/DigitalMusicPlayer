<?php
require_once('./adminFiles.php');
if(isset($_POST['genre'])){
  // echo $_POST['genre'];
  $value = $_POST['genre'];
  $genreId = $_GET['id'];
  mysqli_query($con, "UPDATE genres SET name='$value' WHERE id='$genreId'");
  header("Location: genreAdmin.php");
} 
?>
<form action = <?php echo 'updateGenre.php?id='.$_GET['id']?> method="POST" class="form">
<?php 
  if($_GET['id']){
    $id = $_GET['id'];
    $query = mysqli_query($con, "SELECT name FROM genres WHERE id='$id'");
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
      echo '
      <label for="name">Name</label>
      <input type="text" name="genre" value= '.$result[0]['name'].'>
      <br>
      <input type="submit" value="update genre" class="btn btn-primary">
      ';
  }else{
    header("Location: genreAdmin.php");
  
  }
?>
</form>
