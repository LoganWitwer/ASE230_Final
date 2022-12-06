<?php
require_once('../Settings/settings.php');
class Auth{
    
    public static function signup($connection, $name, $email, $password, $isAdmin){
        $query=$connection->prepare('INSERT INTO user (`name`, `email`, `password`, `isAdmin`) VALUES (?,?,?,?)');
        $query->execute([$name, $email, $password, $isAdmin]);
    }

    public static function signin($connection,$email,$password){
        $query=$connection->prepare('SELECT * FROM user WHERE `email`=?');
        $query->execute([$email]);
        if($query->rowCount()==0){
            echo 'Enter a valid email.';
            return false;
        } 
        $result=$query->fetch();
        if(!password_verify($password, $result['password'])){
            echo 'Incorrect password.';
            return false;
        }
        $_SESSION['logged']=true; 
        $_SESSION['ID']=$result['userID'];
        $_SESSION['role']=$result['isAdmin'];
        $_SESSION['name']=$result['name'];
        return true;
    }

    public static function signout(){
        $_SESSION=[];
        session_destroy();
    }
    
    
}