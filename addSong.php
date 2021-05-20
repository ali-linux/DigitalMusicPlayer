<?php
require_once('./adminFiles.php');
if($_POST['title'] &&$_POST['artist']&&$_POST['genre']){
  $title = $_POST['title'];
  echo $title ;
  $artist = $_POST['artist'];
  echo $artist ;
  $genre = $_POST['genre'];
  $album = $_POST['album'];
  echo $genre ;
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
       $res = mysqli_query($con, "INSERT INTO songs VALUES('','$title','$artist','$album','$genre','','assets/music/$file_name', '','')");
       print_r($res);
       header("Location: songAdmin.php");
    }else{
       print_r($errors);
    }
  }
}else{
  header("Location: songAdmin.php");

}
?>
