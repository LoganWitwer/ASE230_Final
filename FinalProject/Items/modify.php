<?php
session_start();
require_once('../Settings/settings.php');
require_once('itemClass.php');
require_once("../Asset/head.php");
require_once("../Asset/header.php");
if(count($_POST)>0){
    Item::modify($connection, $_POST['description'], $_POST['price'], $_POST['itemName']);
}
?>
<div class ="center-screen">

<form method="POST">
    Item Name: <input type="text" name="itemName" /><br>
    Description: <input type="text" name="description" /><br>
    Price: <input type="text" name="price" /><br>
    <input type="submit" value="Submit" />
</form>

<p class="center"><a href="../Pages/members_page.php">Back</a></p>

</div>

<?php
require_once("../Asset/footer.php");
?>