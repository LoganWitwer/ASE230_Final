<?php
session_start();
require_once('../Settings/settings.php');
require_once('restaurantClass.php');
$restaurantID = $_GET['id'];
Restaurant::detail($connection, $restaurantID);
if(count($_POST)>0){
    array_push($_SESSION['cart'], $_POST['submit']);
}
print_r($_SESSION['cart']);
