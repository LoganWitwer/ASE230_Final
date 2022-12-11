<?php
session_start();
if(!$_SESSION['ID']==1){

} else {
    require_once('../Settings/settings.php');
    require_once('itemClass.php');
    Item::delete($connection, $_GET['id']);
    header('location: index.php?id='.$_GET['restaurant']);
}
?>