<?php 

	require_once './includes/pagesHandler/registerHandler.php';
	require_once './includes/pagesHandler/loginHandler.php';
	if(isset($_SESSION['userLoggedIn'])){
		header("Location: index.php");
	} 
	function getInputValue($name){
		if(isset($_POST[$name])){
			echo $_POST[$name];
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
	<title>Welcom to Kurdify</title>
</head>
<body>
<?php 
		if(isset($_POST['signUpButton'])){
			echo '
			<script>
			$(document).ready(function() {
	
				$("#loginForm").hide();
				$("#registerForm").show();
			});
		</script>
			';
		} else{
			echo '
			<script>
			$(document).ready(function() {
	
				$("#loginForm").show();
				$("#registerForm").hide();
			});
		</script>
			';
		}
	?>

	<div id="background">
	<div class="black-layer">
		<div id="loginContainer">
			<div id="inputContainer">
					<form id="loginForm" action="registration.php" method="POST" autocomplete="off">
						<h2>Login to your account</h2>
						<p>
						<?php echo $account->getError(Constants::$loginFailed) ?>
							<label for="loginUsername">Username</label>
							<input autocomplete="off" id="loginUsername" name="loginUsername" type="text" 
							placeholder="e.g. JohnDoe" value="<?php getInputValue('loginUsername') ?>" required>
						</p>
						<p>
							<label for="loginPassword">Password</label>
							<input autocomplete="off" id="loginPassword" name="loginPassword" type="password" required>
						</p>
	
						<button type="submit" name="loginButton">LOG IN</button>
						<div class="hasAccountText">
							<span id="hideLogin">Don't have an Account yet? <span id="signUp">Sign Up</span> </span>
						</div>
					</form>
	
					<form id="registerForm" action="registration.php" method="POST" autocomplete="off">
						<h2>SIGN UP Form </h2>
						<p>
							<label for="username">Username</label>
							<input id="username" name="username" type="text" placeholder="e.g. JohnDoe" value="<?php getInputValue('username') ?>" required>
							<?php echo $account->getError(Constants::$usernameLength) ?>
							<?php echo $account->getError(Constants::$usernameTaken) ?>
						</p>
						<p>
							<label for="firstName">First Name</label>
							<input id="firstName" name="firstName" type="text" placeholder="e.g. John" value="<?php getInputValue('firstName') ?>"  required>
							<?php echo $account->getError(Constants::$firstNameLength) ?>
						</p>
						<p>
							<label for="lastName">Last Name</label>
							<input id="lastName" name="lastName" type="text" placeholder="e.g. Doe" value="<?php getInputValue('lastName') ?>"  required>
							<?php echo $account->getError(Constants::$lastNameLength) ?>
						</p>
	
						<p>
							<label for="email">Email</label>
							<input id="email" name="email" type="email" placeholder="e.g. johnDoe@email.com"  value="<?php getInputValue('email') ?>" required>
							<?php echo $account->getError(Constants::$emailsDoNotMatch) ?>
							<?php echo $account->getError(Constants::$emailInvalid) ?>
							<?php echo $account->getError(Constants::$emailsTaken) ?>
						</p>
						<p>
							<label for="email2">Confirm Email</label>
							<input id="email2" name="email2" type="email" placeholder="Re-type Email" value="<?php getInputValue('email2') ?>"  required>
						</p>
						<p>
							<label for="password">Password</label>
							<input id="password" name="password" type="password"  required>
							<?php echo $account->getError(Constants::$passwordsDoNoMatch) ?>
							<?php echo $account->getError(Constants::$passwordNotAlphanumeric) ?>
							<?php echo $account->getError(Constants::$passwordLength) ?> 
						</p>
						<p>
							<label for="password2">Confirm Password</label>
							<input id="password2" name="password2" type="password" required>
						</p>
	
						<button type="submit" name="signUpButton">Sign Up</button>
						<div class="hasAccountText">
							<span id="hideRegister">Already have an account? Login here.</span>
						</div>
					</form>
				</div>
				<div id="loginText">
					<div class="container">
						<h1>Get Great Songs, Right Now</h1>
						<h2>Listen to loads of songs for free</h2>
						<ul>
							<li>Discover music you'll fall in love with</li>
							<li>Create your own playlists with your favorite songs </li>
							<li>Follow artists to keep up to date</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

</body>
</html>
