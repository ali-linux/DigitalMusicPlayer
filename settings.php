<?php  
include("includes/includedFiles.php");
?>
<div class="gridViewContainer">

<div class="entityInfo">

	<div class="centerSection">
		<div class="userInfo">
			<h1><?php echo $userLoggedIn->getFirstAndLastName(); ?></h1>
		</div>
	</div>
	<script>
	function deleteAcc(){
		const a = confirm('are you sure you want to delete your account?')
		if(a){
			window.location.href = 'deleteAccount.php'
		} else{
			console.log("hello world");
		}
	}
	</script>
	<div class="buttonItems">
		<button class="button" onclick="openPage('updateDetails.php')">USER DETAILS</button>
		<button class="button" onclick="logout()">LOGOUT</button>
		<button class="button" type="submit" style='background:red' onclick="deleteAcc()">delete my account</button>
	</div>


</div>
</div>
