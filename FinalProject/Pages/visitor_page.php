<?php
require_once("../Asset/head.php");
require_once("../Asset/header.php");
session_start();
if(isset($_SESSION['logged'])&&$_SESSION['logged']==true){
    header('location: members_page.php');
}

?>

<div class ="center-screen">
<h1 id = "welcome">Welcome to Tofoo!</h1><br>
<h4 id = "welcome">Your Food Delivery System</h4><br>
<a href="../Auth/signin.php">Go to sign in.</a><br>
Not a member? <a href="../Auth/signup.php">Sign Up!</a>
</div>


<?php
require_once("../Asset/footer.php");
?>