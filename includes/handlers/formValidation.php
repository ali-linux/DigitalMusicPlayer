<?php 
	function sanitizeUsername($username){
		$username = strip_tags(strtolower($username));
		return str_replace(' ', '', $username);
	}
	function sanitizeFormString($formString){
		$formString 	= strip_tags($formString);
		$formString 	= str_replace(' ', '', $formString);
		return ucfirst(strtolower($formString));		 
	}
	function sanitizePassword($password){
		return strip_tags($password);

	}
	function sanitizeEmail($email){
		$email = strip_tags(strtolower($email));
		return str_replace(' ', '', $email);
	}
?>
