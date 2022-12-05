<form method="POST">
    Name: <input type="text" name="name" /><br>
    Address: <input type="text" name="address" /><br>
    Category: <input type="text" name="category" /><br>
    <input type="submit" value="Submit" />
</form>
<?php
require_once('../Settings/settings.php');
require_once('../Restaurant/restaurantClass.php');
if(count($_POST)>0){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $category = $_POST['category'];
    Restaurant::create($connection, $name, $address, $category);
}
        