<form method="POST">
    Street: <input type="text" name="street" /><br>
    City: <input type="text" name="city" /><br>
    State: <input type="text" name="state" /><br>
    Zip Code: <input type="text" name="zip_code" /><br>
	<input type="submit" value="Submit" />
</form><hr />

<?php
session_start();
require_once('../Settings/settings.php');
require_once('../Deliveryaddress/deliveryClass.php');

if(count($_POST)>0){
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];
    Delivery::update($connection, $street, $city, $state, $zip_code, $_GET['id']);
}