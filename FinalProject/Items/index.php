<?php
session_start();
require_once('../Settings/settings.php');
require_once('itemClass.php');
require_once("../Asset/head.php");
require_once("../Asset/header.php");

?>
<div class ="center-screen">
<?php

if($_SESSION['role']==1){
    Item::read($connection, 1, $_GET['id']);
    $restaurant=$_GET['id'];
    echo '<h6 id = "rest"><a href="create.php?id='.$restaurant.'">Create Item</a></h6>
    ';
} else {
    Item::read($connection, 0, $_GET['id']);
}


?>
<br>
<p id="rest"><a href="../Pages/members_page.php">Back</a></p>
</div>

<?php
require_once("../Asset/footer.php");
?>