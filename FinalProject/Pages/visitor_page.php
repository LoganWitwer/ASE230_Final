<h1>Welcome to Tofoo!</h1><br>
<a href="../Auth/signin.php">Go to sign in.</a><br>
Not a member? <a href="../Auth/signup.php">Sign Up!</a>

<?php
session_start();
if($_SESSION['logged']==true){
    header('location: members_page.php');
}