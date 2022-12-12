<?php
session_start();
require_once('authClass.php');
require_once("../Asset/head.php");
require_once("../Asset/header.php");
Auth::signout();
?>
<div class = "center-screen border" >
<h2>You have signed out.</h2><br>
<p><a href="../Pages/visitor_page.php">Return to home page.</a></p>
</div>
<?php
require_once("../Asset/footer.php");
?>