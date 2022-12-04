<form method="POST">
	First and last: <input type="text" name="fullName" /><br>
	Email: <input type="email" name="email" /><br>
    Password: <input type="password" name="password" /><br>

	
	<input type="submit" value="Submit" />
</form><hr />

<?php
session_start();
require_once('../Settings/settings.php');
// require_once('../User/userClass.php');
if(count($_POST)>0){
    //User::create();
    $query=$connection->prepare('INSERT INTO user (name, email, password, isAdmin) VALUES (?,?,?,?)');
    $query->execute([$_POST['fullName'], $_POST['email'], $_POST['password'], '0']);
    
    
    //$query=$connection->prepare('INSERT INTO user (name, email, password, isAdmin) VALUES (?)');
    //$query->execute($_POST['fullName'], $_POST['email'], $_POST['password'], '0');

           
}
/*function signup(){
    $mysqli = new mysqli("127.0.0.1","root","","tofoo");
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $shippingAddress = $_POST['shippingAddress'];
    $result = $mysqli->query("INSERT INTO user (name, email, isAdmin) VALUES ('$fullName', '$email', '0')");
}*/