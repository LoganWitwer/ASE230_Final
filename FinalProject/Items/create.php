<?php
require_once('../Settings/settings.php');
require_once('../Items/itemClass.php');
require_once("../Asset/head.php");
require_once("../Asset/header.php");
$restaurant=$_GET['id'];
if(count($_POST)>0){
    $description = $_POST['description'];
    $price = $_POST['price'];
    $itemName = $_POST['itemName'];
    $restaurant = $_GET['id'];
    Item::create($connection, $description, $price, $itemName, $restaurant);
}
?>
<div class ="center-screen">
<form method="POST">
    Item Name: <input type="text" name="itemName" /><br>
    Description: <input type="text" name="description" /><br>
    Price: <input type="text" name="price" /><br>
    <input type="submit" value="Submit" />
</form>
<p class="center"><a href="index.php?id=<?=$restaurant?>" >Back</a></p>
</div>
<?php
require_once("../Asset/footer.php");
?>