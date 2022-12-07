<?php 
session_start();
require_once('../Settings/settings.php');
require_once('restaurantClass.php');

if($_SESSION['role']==1){
    Restaurant::read($connection, 1);
    echo '<a href="create.php">Add a restaurant.</a>';
} else {
    Restaurant::read($connection, 0);
}
?>
