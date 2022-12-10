<form method="POST">
    Name on Card: <input type="text" name="cardname" /><br>
    CardType: <input type="text" name="type" /><br>
    CardNumber: <input type="text" name="number" /><br>
    Expiration Date: <input type="text" name="expire" /><br>
    cvc: <input type="text" name="cvc" /><br>
	<input type="submit" value="Submit" />
</form><hr />

<form method="POST">
    Name on Card: <input type="text" name="cardname" /><br>
    CardType: <input type="text" name="type" /><br>
    CardNumber: <input type="text" name="number" /><br>
    Expiration Date: <input type="text" name="expire" /><br>
    cvc: <input type="text" name="cvc" /><br>
	<input type="submit" value="Submit" />
</form><hr />

<?php
session_start();
require_once('../Settings/settings.php');
require_once('../PaymentMethod/paymentClass.php');

if(count($_POST)>0){
    $name = $_POST['cardname'];
    $cardtype = $_POST['type'];
    $number = $_POST['number'];
    $expire = $_POST['expire'];
    $cvc = $_POST['cvc'];
    Payment::update($connection, $name, $cardtype, $number, $expire, $cvc,$_GET['id']);
}