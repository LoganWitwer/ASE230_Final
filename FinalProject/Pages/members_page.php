<?php
session_start();
if($_SESSION['logged']==false){
    header('location: vistor_page.php');
}

?>
<h1>Member Page</h1>