<?php

require_once("../Asset/head.php");
require_once("../Asset/header.php");
session_start();
if(count($_POST)>0){
    require_once('../Settings/settings.php');
    require_once('../Auth/authClass.php');
    $email=$_POST['email'];
    $test=Auth::signin($connection, $email, $_POST['password']);
    if($test==true && $_SESSION['role']==1){
        header('location: ../Pages/members_page.php');
    } else if ($test==true){
        header('location: ../Pages/members_page.php');
    } else {

    }
}

?>
<form method="POST" class ="center-screen">
    <label for="exampleFormControlInput1">Email:</label><br>
    <input type="email" name="email" /><br>
    <label for="exampleFormControlInput1">Password:</label><br>
    <input type="password" name="password" /><br><br>
    <button class="btn btn-info" type="submit" value="Submit">Sign in</button>
    <div>Not a member?<br> <a href="../Auth/signup.php">Sign Up!</a></div>
</form>

<?php
require_once("../Asset/footer.php");
?>