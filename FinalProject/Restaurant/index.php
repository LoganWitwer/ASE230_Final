<?php 
session_start();
require_once('../Settings/settings.php');
require_once('restaurantClass.php');
require_once("../Asset/head.php");
require_once("../Asset/header.php");
?>

<?php

if($_SESSION['role']==1){
    Restaurant::read($connection, 1);
    echo '<p class="center"><a href="create.php">Add a restaurant.</a> </p>';
} else {
    Restaurant::read($connection, 0);
}
?>
<p class="center"><a href="../Pages/members_page.php">Back</a></p>
<?php
require_once("../Asset/footer.php");
?>
