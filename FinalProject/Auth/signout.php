<?php
session_start();
require_once('authClass.php');
Auth::signout();
?>
You have signed out.<br>
<a href="../Pages/visitor_page.php">Return to home page.</a>