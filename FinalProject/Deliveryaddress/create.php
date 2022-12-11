<?php
session_start();
require_once('../Settings/settings.php');
require_once('../Deliveryaddress/deliveryClass.php');
require_once("../Asset/head.php");
require_once("../Asset/header.php");

if(count($_POST)>0){
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];
    Delivery::create($connection, $street, $city, $state, $zip_code);
}

?>
<form method="POST" class ="center-screen">
    Street: <input type="text" name="street" /><br>
    City: <input type="text" name="city" /><br>
    State: <input type="text" name="state" /><br>
    Zip Code: <input type="text" name="zip_code" /><br>
	<input type="submit" value="Submit" />
</form><hr />

<?php
require_once("../Asset/footer.php");
?>