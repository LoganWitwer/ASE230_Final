<form method="POST">
    Street: <input type="text" name="street" /><br>
    City: <input type="text" name="city" /><br>
    State: <input type="text" name="state" /><br>
    Zip Code: <input type="text" name="zip" /><br>
	<input type="submit" value="Submit" />
</form><hr />

<?php
session_start();
require_once('../Settings/settings.php');

if(count($_POST)>0){

    $query=$connection->prepare('INSERT INTO deliveryaddress (street, city, state, zip) VALUES (?,?,?,?)');
    echo $_POST['street'];
    $query->execute([$_POST['street'], $_POST['city'], $_POST['state'], $_POST['zip_code']]);
}