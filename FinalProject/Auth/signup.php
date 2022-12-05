<form method="POST">
	First and last: <input type="text" name="fullName" /><br>
	Email: <input type="email" name="email" /><br>
    Password: <input type="password" name="password" /><br>

	
	<input type="submit" value="Submit" />
</form><hr />

<?php

require_once('../Settings/settings.php');
require_once('../Auth/authClass.php');
if(count($_POST)>0){
    AUTH::signup($connection, $_POST['fullName'], $_POST['email'], $_POST['password'], 0);    
}
