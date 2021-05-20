<?php
require_once('./adminFiles.php');
$query = mysqli_query($con, "SELECT * FROM songs");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

$genreOptions = mysqli_query($con, "SELECT * FROM genres");
$genres = mysqli_fetch_all($genreOptions, MYSQLI_ASSOC);

$albumOptions = mysqli_query($con, "SELECT * FROM album");
$albums = mysqli_fetch_all($albumOptions, MYSQLI_ASSOC);

$artistOptions = mysqli_query($con, "SELECT * FROM artists");
$artists = mysqli_fetch_all($artistOptions, MYSQLI_ASSOC);
?>

  <h1>ADMIN DASHBOARD - Song</h1>

  <div class="sections">
    <div class="leftSection">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">artist</th>
      <th scope="col">album</th>
      <th scope="col">genre</th>
      <th scope="col">plays</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php 
        foreach ($result as $song => $value) {
          $key=$result[$song];
          echo '
          <tr>
            <th scope="row">'.$key['id'].'</th>
            <td>'.$key['title'].'</td>
            <td>'.$key['artist'].'</td>
            <td>'.$key['album'].'</td>
            <td>'.$key['genre'].'</td>
            <td>'.$key['plays'].'</td>
              <td><a href="updateSong.php?id='.$key['id'].'" class="btn btn-success">update</a></td>
            <td><a href="deleteSong.php?id='.$key['id'].'" class="btn btn-danger">delete</a> </td>
          </tr>
          ';
    }
  ?>
  </tbody>
</table>
    </div>
    <div class="rightSection">
    <form action="addSong.php" method="post" enctype="multipart/form-data" >
          <label for="title">title</label>
          <input type="text" name='title'>
          <br>
          <label for="artist">artist</label>
          <select name="artist">
         <?php 
          foreach ($artists as $artist => $value) {
            $key=$artists[$artist];
            echo '<option value='.$key['id'].'>'.$key['name'].'</option>';
          }
         ?>
          
          </select>
          <br>
          <label for="genre">genre</label>
          <select name="genre">
         <?php 
          foreach ($genres as $genre => $value) {
            $key=$genres[$genre];
            echo '<option value='.$key['id'].'>'.$key['name'].'</option>';
          }
         ?>
          
          </select>
          <br>
          <label for="album">album</label>
          <select name="album">
         <?php 
          foreach ($albums as $album => $value) {
            $key=$albums[$album];
            echo '<option value='.$key['id'].'>'.$key['title'].'</option>';
          }
         ?>
          </select>
          <br>
          <label for="song"> song</label>
          <input type="file" name="song" accept=".mp3"/>
          <br>
          <input type="submit" value="Add album"  class="btn btn-primary">
    </form>
    </div>
    </div>
  <?php 
include("includes/layout/footerAdmin.php");
?>
