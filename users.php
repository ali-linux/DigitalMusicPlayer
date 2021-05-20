<?php
require_once('./adminFiles.php');
if(isset($_POST['id'])){
  $userId = $_POST['id'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];

  mysqli_query($con, "UPDATE users SET firstName='$firstName',lastName='$lastName',email='$email' WHERE id='$userId'");
  header('LOCATION: adminDashboard.php');
}
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = mysqli_query($con, "SELECT * FROM users WHERE id='$id' ");
  $result = mysqli_fetch_assoc($query);
}
// else{
//   header('LOCATION: adminDashboard.php');
//   }
?>

<form action=<?php echo 'users.php?id='.$_GET['id']?> method="post" class="form">
  <input type="hidden" name="id" value=<?php echo $_GET['id'];?> >
  <div class="form-input">
    <label for="username">username</label>
    <input type="text" name='username' disabled value=<?php echo $result['username'];?>>
  </div>
  <div class="form-input">
    <label for="firstName">first Name</label>
    <input type="text" name='firstName' value=<?php echo $result['firstName'];?>>
  </div>
  <div class="form-input">
    <label for="lastName">last Name</label>
    <input type="text"name='lastName' value=<?php echo $result['lastName'];?>>
  </div>
  <div class="form-input">
    <label for="email">email</label>
    <input type="text" name="email"  value=<?php echo $result['email'];?>>
  </div>
  <div class="form-input">
    <label for="isAdmin">isAdmin</label>
    <input type="text" name="isAdmin" value=<?php echo $result['isAdmin'];?>>
  </div>
  <div class="form-input">
    <input type="submit" value="Update user" class="btn btn-success" style="width: 100%;">
  </div>
</form>
