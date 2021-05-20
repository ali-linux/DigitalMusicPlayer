<?php
require_once('./adminFiles.php');
$query = mysqli_query($con, "SELECT * FROM artists ");
$result = mysqli_fetch_all($query,MYSQLI_ASSOC);
?>
  <h1>ADMIN DASHBOARD - Artist Table</h1>

<div class="sections">
<div class="leftSection">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
    </tr>
  </thead>
  <tbody>
  <?php 
        foreach ($result as $artist => $value) {
          $key=$result[$artist];
          echo '
          <tr>
            <th scope="row">'.$key['id'].'</th>
            <td>'.$key['name'].'</td>
            <td><a href="deleteArtist.php?id='.$key['id'].'" class="btn btn-danger">delete</a> </td>
            <td><a href="updateArtist.php?id='.$key['id'].'" class="btn btn-success">update</a> </td>
          </tr>
          ';
    }
  ?>
  </tbody>
</table>
</div>
<div class="rightSection">
    <form action="addArtist.php" method="get">
          <label for="name">Name</label>
          <input type="text" name='artist'>
          <br>
          <input type="submit" value="Add artist" class="btn btn-primary">
    </form>
    </div>
</div>
