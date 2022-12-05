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

if(count($_POST)>0){

    $query=$connection->prepare('INSERT INTO paymentmethod (name, cardType, cardNumber, expirationDate, cvc) VALUES (?,?,?,?,?)');
    echo $_POST['name'];
    $query->execute([$_POST['cardname'], $_POST['type'], $_POST['number'], $_POST['expire'], $_POST['cvc']]);
}