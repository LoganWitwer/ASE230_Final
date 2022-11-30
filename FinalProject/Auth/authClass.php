<?php

class Auth{
    public static function signup(){
        $mysqli = new mysqli("127.0.0.1","root","","tofoo");
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $shippingAddress = $_POST['shippingAddress'];
        $result = $mysqli->query("INSERT INTO user (name, email, isAdmin) VALUES ('$fullName', '$email', '0')");
    }
}