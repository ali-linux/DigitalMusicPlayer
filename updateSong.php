<?php
require_once('./adminFiles.php');
if(isset($_POST['title'])&&isset($_POST['artist'])&&isset($_POST['genre']) &&isset($_POST['id'])&&isset($_POST['album'])){
  $title = $_POST['title'];
  $artist = $_POST['artist'];
  $genre = $_POST['genre'];
  $album = $_POST['album'];
  $songId = $_POST['id'];
  print_r($_FILES );
  // echo $title.'-'.$genre.['name'];
  if(isset($_FILES['song'])){

    $errors= array();
    $file_name = $_FILES['song']['name'];
    $file_size =$_FILES['song']['size'];
    $file_tmp =$_FILES['song']['tmp_name'];
    $file_type=$_FILES['song']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['song']['name'])));
    
    $extensions= array("mp3");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 20097152){
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,"assets/music/".$file_name);
       echo "Success";
       mysqli_query($con, "UPDATE songs SET title='$title',album='$album',artist='$artist', genre='$genre', path='assets/music/$file_name' WHERE id='$songId'");
       header("Location: songAdmin.php");
    }else{
       print_r($errors);
    }
  }
  mysqli_query($con, "UPDATE songs SET title='$title',album='$album',artist='$artist', genre='$genre' WHERE id='$songId'");
  header("Location: songAdmin.php");
} 
if($_GET['id']){
  $id = $_GET['id'];
  $query = mysqli_query($con, "SELECT * FROM songs WHERE id='$id'");
  $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
  $result = $result[0];
  
  $genreOptions = mysqli_query($con, "SELECT * FROM genres");
  $genres = mysqli_fetch_all($genreOptions, MYSQLI_ASSOC);

  $albumOptions = mysqli_query($con, "SELECT * FROM album");
  $albums = mysqli_fetch_all($albumOptions, MYSQLI_ASSOC);

  $artistOptions = mysqli_query($con, "SELECT * FROM artists");
  $artists = mysqli_fetch_all($artistOptions, MYSQLI_ASSOC);
}else{
  header("Location: songAdmin.php");

}
?>
<form action = <?php echo 'updateSong.php?id='.$_GET['id']?> method="POST" class="form"enctype="multipart/form-data">
<input type="hidden" name="id" value=<?php echo $_GET['id'];?> >
  <div class="form-input">
    <label for="title">title</label>
    <input type="text" name='title'  value=<?php echo $result['title'];?>>
  </div>
  <div class="form-input">
  <label for="album">album</label>
          <select name="album">
          <option value=<?php echo $result['album']?> selected><?php echo $albums[$result['album']]['title'] ?></option>
         <?php 
          foreach ($albums as $album => $value) {
            $key=$albums[$album];
            echo '<option value='.$key['id'].'>'.$key['title'].'</option>';
          }
         ?>
          </select>
          <br>
  </div>
  <div class="form-input">
  <label for="genre">genre</label>
          <select name="genre">
          <option value=<?php echo $result['genre']?> selected><?php echo $genres[$result['genre']]['name'] ?></option>
         <?php 
          foreach ($genres as $genre => $value) {
            $key=$genres[$genre];
            echo '<option value='.$key['id'].'>'.$key['name'].'</option>';
          }
         ?>
          
          </select>
          <br>
  </div>
  
  <div class="form-input">
  <label for="artist">artist</label>
          <select name="artist">
          <option value=<?php echo $result['artist']?> selected><?php echo $artists[$result['artist']]['name'] ?></option>
         <?php 
          foreach ($artists as $artist => $value) {
            $key=$artists[$artist];
            echo '<option value='.$key['id'].'>'.$key['name'].'</option>';
          }
         ?>
          
          </select>
          <br>
  </div>
  <div class="form-input">
    <label for="song">song</label>
    <input type="file" name="song" />
    <br>
  </div>
  <div class="form-input">
    <input type="submit" value="Update song" class="btn btn-success" style="width: 100%;">
  </div>
</form>
