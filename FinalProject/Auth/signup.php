<form method="POST">
	First and last: <input type="text" name="fullName" /><br>
	Email: <input type="email" name="email" /><br>
    Delivery Address (can change later): <input type="text" name="shippingAddress" /><br>

	
	<input type="submit" value="Submit" />
</form><hr />

<?php
session_start();
require_once('../Settings/settings.php');
require_once('authClass.php');
if(count($_POST)>0){
    Auth::signup();
}
/*function signup(){
    $mysqli = new mysqli("127.0.0.1","root","","tofoo");
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $shippingAddress = $_POST['shippingAddress'];
    $result = $mysqli->query("INSERT INTO user (name, email, isAdmin) VALUES ('$fullName', '$email', '0')");
}*/