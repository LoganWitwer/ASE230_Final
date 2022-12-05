<form method="POST">
    Description: <input type="text" name="description" /><br>
    Price: <input type="text" name="price" /><br>
    Item Name: <input type="text" name="itemName" /><br>
    <input type="submit" value="Submit" />
</form>

<?php
require_once('../Settings/settings.php');
require_once('../Items/itemClass.php');

if(count($_POST)>0){
    $description = $_POST['description'];
    $price = $_POST['price'];
    $itemName = $_POST['itemName'];
    Item::create($connection, $description, $price, $itemName);
}