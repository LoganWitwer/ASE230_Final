<?php
require_once('../Settings/settings.php');
class Auth{
    public static function signup($connection, $name, $email, $password, $isAdmin){
        $query=$connection->prepare('INSERT INTO user (`name`, `email`, `password`, `isAdmin`) VALUES (?,?,?,?)');
        $query->execute([$name, $email, $password, $isAdmin]);
    }
}