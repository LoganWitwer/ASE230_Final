<?php
session_start();
if($_SESSION['logged']==false || $_SESSION['role']==0){
    header('location: vistor_page.php');
}
if($_SESSION['logged']==true && $_SESSION['role']==0){
    header('location: members_page.php');
}

?>
<h1>Admin Page</h1>