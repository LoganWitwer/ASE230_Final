<?php
session_start();
require_once('../Settings/settings.php');
require_once('itemClass.php');

if($_SESSION['role']==1){
    Item::read($connection, 1, $_GET['id']);
    $restaurant=$_GET['id'];
    echo '<a href="create.php?id='.$restaurant.'">Create Item</a>';
} else {
    Item::read($connection, 0, $_GET['id']);
}


?>