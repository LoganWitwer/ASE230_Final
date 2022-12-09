<?php
session_start();
require_once('../Restaurant/restaurantClass.php');
$userID = $_SESSION['ID'];
$userName = $_SESSION['name'];
if($_SESSION['logged']==false){
    header('location: visitor_page.php');
}
echo 'Hello '.$userName.'!';
Restaurant::read($connection, 0);

?>
<br>
<a href="../Order/checkout.php">Check out</a>
<a href="../Deliveryaddress/create.php"> Add Delivery Address </a>

<a href="../PaymentMethod/create.php"> Add Card </a>
<a href="../Auth/signout.php">Sign out</a>
