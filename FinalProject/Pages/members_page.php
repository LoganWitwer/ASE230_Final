<?php
session_start();
require_once('../Restaurant/restaurantClass.php');
$userID = $_SESSION['ID'];
$userName = $_SESSION['name'];
if($_SESSION['logged']==false){
    header('location: vistor_page.php');
}
echo 'Hello '.$userName.'!';
Restaurant::read($connection, 0);

?>
<br>
<a href="../Order/index.php">Place Order</a>
<a href="../Auth/signout.php">Sign out</a>
