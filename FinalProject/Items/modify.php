<?php
session_start();
require_once('../Settings/settings.php');
require_once('itemClass.php');
if(count($_POST)>0){
    Item::modify($connection, $_POST['description'], $_POST['price'], $_POST['itemName']);
}
?>
<form method="POST">
    Description: <input type="text" name="description" /><br>
    Price: <input type="text" name="price" /><br>
    Item Name: <input type="text" name="itemName" /><br>
    <input type="submit" value="Submit" />
</form>