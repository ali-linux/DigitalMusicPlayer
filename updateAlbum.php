<?php
require_once('./adminFiles.php');
if(isset($_POST['title'])&&isset($_POST['artist'])&&isset($_POST['genre']) &&isset($_POST['id'])){
  $title = $_POST['title'];
  $artist = $_POST['artist'];
  $genre = $_POST['genre'];
  $albumId = $_POST['id'];
  print_r($_FILES );
  // echo $title.'-'.$genre.['name'];
  if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $extensions= array("jpeg","jpg","png","PNG");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152){
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,"assets/images/artwork/".$file_name);
       echo "Success";
       mysqli_query($con, "UPDATE album SET title='$title',artist='$artist', genre='$genre', artworkPath='assets/images/artwork/$file_name' WHERE id='$albumId'");
      header("Location: albumAdmin.php");

      }else{
        print_r($errors);
      }
    }else{
      echo 'image is not set';
    }
    mysqli_query($con, "UPDATE album SET title='$title',artist='$artist', genre='$genre' WHERE id='$albumId'");
  header("Location: albumAdmin.php");
} 
if($_GET['id']){
  $id = $_GET['id'];
  $query = mysqli_query($con, "SELECT * FROM album WHERE id='$id'");
  $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
  $result = $result[0];
  
  $genreOptions = mysqli_query($con, "SELECT * FROM genres");
  $genres = mysqli_fetch_all($genreOptions, MYSQLI_ASSOC);

  $artistOptions = mysqli_query($con, "SELECT * FROM artists");
  $artists = mysqli_fetch_all($artistOptions, MYSQLI_ASSOC);
}else{
  header("Location: albumAdmin.php");

}
?>
<form action = <?php echo 'updateAlbum.php?id='.$_GET['id']?> method="POST" class="form"enctype="multipart/form-data">
<input type="hidden" name="id" value=<?php echo $_GET['id'];?> >
  <div class="form-input">
    <label for="title">title</label>
    <input type="text" name='title'  value=<?php echo $result['title'];?>>
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
    <label for="artworkPath">artworkPath</label>
    <input type="file" name="image" />
    <br>
    <img style="max-width: 200px; max-height:200px; object-fit:cover;" src=<?php echo $result['artworkPath'];?> alt="">
  </div>
  <div class="form-input">
    <input type="submit" value="Update album" class="btn btn-success" style="width: 100%;">
  </div>
</form>
