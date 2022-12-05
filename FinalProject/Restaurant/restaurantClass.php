<?php
require_once('../Settings/settings.php');

class Restaurant{

    public static function create($connection, $name, $address, $category){
        $query=$connection->prepare('INSERT INTO restaurant (`name`, `address`, `category`) VALUES (?,?,?)');
        $query->execute([$name, $address, $category]);
    }
}