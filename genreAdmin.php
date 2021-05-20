<?php
require_once('./adminFiles.php');
$query = mysqli_query($con, "SELECT * FROM genres ");
$result = mysqli_fetch_all($query,MYSQLI_ASSOC);
?>
  <h1>ADMIN DASHBOARD - Genre Table</h1>
  <div class="sections">
    <div class="leftSection">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        <?php 
              foreach ($result as $genre => $value) {
                $key=$result[$genre];
                echo '
                <tr>
                  <th scope="row">'.$key['id'].'</th>
                  <td>'.$key['name'].'</td>
                  <td><a href="deleteGenre.php?id='.$key['id'].'" class="btn btn-danger">delete</a> </td>
                  <td><a href="updateGenre.php?id='.$key['id'].'" class="btn btn-success">update</a> </td>
                </tr>
                ';
          }
        ?>
        </tbody>
      </table>
    </div>
    <div class="rightSection">
    <form action="addGenre.php" method="get">
          <label for="name">Name</label>
          <input type="text" name='genre'>
          <br>
          <input type="submit" value="Add genre" class="btn btn-primary">
    </form>
    </div>
  </div>
