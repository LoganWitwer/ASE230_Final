<form method="POST">
	First and last: <input type="text" name="fullName" /><br>
	Email: <input type="email" name="email" /><br>
    Password: <input type="password" name="password" /><br>
	<label for="admin">Role:</label> 
	<select name="admin" id="admin">
		<option value=0>User</option>
		<option value=1>Admin</option>
	</select>

	
	<input type="submit" value="Submit" />
</form><hr />

<?php

require_once('../Settings/settings.php');
require_once('../Auth/authClass.php');
if(count($_POST)>0){
	$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    AUTH::signup($connection, $_POST['fullName'], $_POST['email'], $password, $_POST['admin']);
}
