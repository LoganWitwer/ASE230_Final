<?php
session_start();
if(count($_POST)>0){
    require_once('../Settings/settings.php');
    require_once('../Auth/authClass.php');
    $email=$_POST['email'];
    //$password=$_POST['password'];
    $test=Auth::signin($connection, $email, $_POST['password']);
    if($test==true){
        header('location: ../Pages/admin_page.php');
    } else{
        
    }
}

?>
<form method="POST">

Email: <input type="email" name="email" /><br>
Password: <input type="password" name="password" /><br>


<input type="submit" value="Submit" />
</form><hr />