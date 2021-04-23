<?php
  class Account {
    private $con;
    private $errorArray;
    public function __construct($con){
      $this->con = $con;
      $this->errorArray = array();
    }
   
    public function validateAndRegister(
      $username,
      $email2,
      $email,
      $firstName,
      $lastName,
      $password,
      $password2
      ){
      $this->validateUsername($username);
      $this->validateFirstName($firstName);
      $this->validateLastName($lastName);
      $this->validateEmails($email,$email2);
      $this->validatePasswords($password,$password2);

      if(empty($this->errorArray) == true){
        // INSERT INTO DB
        return $this->insertUserDetails(
          $username,
          $firstName,
          $lastName,
          $email,
          $password
        );
      } else {
        return false;
      }
    }

    public function login($username,$password){
      $password = md5($password);
      $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$username' AND password='$password'");

      if(mysqli_num_rows($query) == 1){
        return true;
      } else {
        array_push($this->errorArray,Constants::$loginFailed);
        return false;
      }
    }

    public function getError($error){
      if(!in_array($error, $this->errorArray)){
        $error = "";
      }
      return "<span class='errorMessage'>$error</span>";
    }

    private function insertUserDetails($username,$firstName,$lastName,$email,$password){
      $encryptedPw = md5($password);
      $profilePic = "assets/images/profilePics/head_emerald.png";
      $date = date("Y-m-d");
      $result = mysqli_query($this->con, "INSERT INTO users VALUES('','$username', '$firstName', '$lastName','$email','$encryptedPw', '$date', '$profilePic','')");
      echo 'result:'. $result;
      return $result;
    }

    private function validateUsername($username){
      if(strlen($username)>25 || strlen($username)<3){
        return  array_push($this->errorArray,Constants::$usernameLength);
      } 
      $checkUserNameQuery = mysqli_query($this->con,"SELECT username FROM users WHERE username='$username'");
      if(mysqli_num_rows($checkUserNameQuery) != 0){
        return array_push($this->errorArray, Constants::$usernameTaken);
      }
    }
    private function validateFirstName($firstName){
      if(strlen($firstName)>25 || strlen($firstName)<3){
        return  array_push($this->errorArray,Constants::$firstNameLength);
    }
  }
    private function validateLastName($lastName){
      if(strlen($lastName)>25 || strlen($lastName)<3){
        return  array_push($this->errorArray,Constants::$lastNameLength);
    }
  }
    private function validateEmails($email1,$email2){
      if($email1 != $email2){
        return array_push($this->errorArray, Constants::$emailsDoNotMatch);
      }
      if(!filter_var($email1, FILTER_VALIDATE_EMAIL)){
        return array_push($this->errorArray,Constants::$emailInvalid);
      }
      $checkUserNameQuery= mysqli_query($this->con,"SELECT email FROM users WHERE email='$email1'");
      if(mysqli_num_rows($checkUserNameQuery) != 0){
        return array_push($this->errorArray, Constants::$emailsTaken);
      }
    }
    private function validatePasswords($password1,$password2){
      if($password1 != $password2){
        return array_push($this->errorArray,Constants::$passwordsDoNoMatch);
      }
      if(preg_match('/[^A-Za-z0-9]/',$password1)){
        return array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
      }
      if(strlen($password1)<8){
        return array_push($this->errorArray, Constants::$passwordLength);
    }
  }
}
