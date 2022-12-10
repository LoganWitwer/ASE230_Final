<?php
require_once("../Asset/head.php");
require_once("../Asset/header.php");
?>

<form method="POST" class ="center-screen">
	<label for="exampleFormControlInput1">Fullname:</label><br>
	<input type="text" name="fullName" /><br>
	<label for="exampleFormControlInput1">Email:</label><br>
	<input type="email" name="email" /><br>
	<label for="exampleFormControlInput1">Password: </label><br>
   	<input type="password" name="password" /><br>
	<label for="admin">Role:</label> <br>
	<select name="admin" id="admin">
		<option value=0>User</option>
		<option value=1>Admin</option>
	</select><br><br>
	<button type="submit" value="Submit" >Sign up</button>
	<div>already a member?<br> <a href="../Auth/signin.php">Sign in!</a></div>
</form><hr />

<?php

require_once('../Settings/settings.php');
require_once('../Auth/authClass.php');
if(count($_POST)>0){
	$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    if(AUTH::signup($connection, $_POST['fullName'], $_POST['email'], $password, $_POST['admin'])){
		header('location: ../Auth/signin.php');
	}
}


require_once("../Asset/footer.php");