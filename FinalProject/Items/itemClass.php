<?php
require_once('../Settings/settings.php');

class Item{
    public static function create($connection, $description, $price, $itemName){
        $query=$connection->prepare('INSERT INTO items (`description`, `price`, `itemName`) VALUES (?,?,?)');
        $query->execute([$description, $price, $itemName]);
    }
}