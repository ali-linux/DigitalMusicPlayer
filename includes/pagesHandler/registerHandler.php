<?php
	require_once './includes/config.php ';
	require_once './includes/classes/Constants.php';
	require_once './includes/handlers/formValidation.php';
	require_once './includes/classes/Account.php';
	$account = new Account($con);
	if(isset($_POST['signUpButton'])){
		$username 		= sanitizeUsername($_POST['username']);
		$firstName 		= sanitizeFormString($_POST['firstName']);
		$lastName 		= sanitizeFormString($_POST['lastName']);
		$email        = sanitizeEmail($_POST['email']);
		$email2       = sanitizeEmail($_POST['email2']);
		$password 		= sanitizePassword($_POST['password']);
		$password2 		= sanitizePassword($_POST['password2']);
		
		$wasSuccess = $account->validateAndRegister(
			$username,
			$email2,
			$email,
			$firstName,
			$lastName,
			$password,
			$password2);
			if($wasSuccess){
				$_SESSION['userLoggedIn'] = $username;
				header("Location: index.php");
			} 

	}
