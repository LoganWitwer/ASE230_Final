<?php
require_once('../Settings/settings.php');
require_once('../Items/itemClass.php');
$restaurant=$_GET['id'];
if(count($_POST)>0){
    $description = $_POST['description'];
    $price = $_POST['price'];
    $itemName = $_POST['itemName'];
    $restaurant = $_GET['id'];
    Item::create($connection, $description, $price, $itemName, $restaurant);
}
?>
<form method="POST">
    Description: <input type="text" name="description" /><br>
    Price: <input type="text" name="price" /><br>
    Item Name: <input type="text" name="itemName" /><br>
    <input type="submit" value="Submit" />
</form>
<?php
echo '<a href="index.php?id='.$restaurant.'">Back</a>';