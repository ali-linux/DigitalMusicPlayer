<?php
require_once('./adminFiles.php');

?>

  <h1>ADMIN DASHBOARD</h1>

    <div class="sections">
    <div class="leftSection">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">username</th>
      <th scope="col">first Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">email</th>
      <th scope="col">isAdmin</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php 
        $users = $userLoggedIn->getAllUsers();
        foreach ($users as $user => $value) {
          $key=$users[$user];
          echo '
          <tr>
            <th scope="row">'.$key['id'].'</th>
            <td>'.$key['username'].'</td>
            <td>'.$key['firstName'].'</td>
            <td>'.$key['lastName'].'</td>
            <td>'.$key['email'].'</td>
            <td>'.$key['isAdmin'].'</td>
              <td><a href="users.php?id='.$key['id'].'" class="btn btn-success">update</a></td>
            <td><a href="deleteUser.php?id='.$key['id'].'" class="btn btn-danger">delete</a> </td>
          </tr>
          ';
    }
  ?>
  </tbody>
</table>
    </div>
    </div>
<?php 
include("includes/layout/footerAdmin.php");
?>
