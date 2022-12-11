
<?php
require_once('../Settings/settings.php');
require_once('../Restaurant/restaurantClass.php');
require_once("../Asset/head.php");
require_once("../Asset/header.php");
if(count($_POST)>0){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    Restaurant::create($connection, $name, $address, $category, $description);
}
?>
<h2 class = "page-title" >Create Restaurant</h2>
<div  id = "border" class = "center-screen border" >
    
<form method="POST">
    Name: <input type="text" name="name" /><br>
    Address: <input type="text" name="address" /><br>
    Category: <input type="text" name="category" /><br>
    Description: <input type="text" name="description" /> <br>
    <input type="submit" value="Submit" />
</form>
<p id="rest"><a href="../Pages/members_page.php">Back</a></p>
</div>
<?php
require_once("../Asset/footer.php");
?>
        