<?php
session_start();
require_once('../Settings/settings.php');
require_once('restaurantClass.php');
require_once("../Asset/head.php");
require_once("../Asset/header.php");
if(count($_POST)>0){
    $restaurant = $_GET['id'];
    Restaurant::modify($connection, $_POST['name'], $_POST['address'], $_POST['category'], $_POST['description'], $restaurant);
}
?>
<div class ="center-screen">

<form method="POST" >
    Name: <input type="text" name="name" /><br>
    Address: <input type="text" name="address" /><br>
    Category: <input type="text" name="category" /><br>
    Description: <input type="text" name="description" /><br>
    <input type="submit" value="Submit" />
</form>

<p class="center"><a href="../Pages/members_page.php">Back</a></p>

</div>

<?php
require_once("../Asset/footer.php");
?>