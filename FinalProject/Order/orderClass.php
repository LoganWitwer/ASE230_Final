<?php
require_once('../Settings/settings.php');
class Order{
    public static function create($connection, $price, $payment, $delivery, $orderitems){
        $query2=$connection->prepare('INSERT INTO foodorder (userID, restaurantID, orderTime, price, paymentID, deliveryID) VALUES (?,?,?,?,?,?)');
        $time = date("Y-m-d H:i:s");
        echo $time;
        $query2->execute([$_SESSION['ID'], $_SESSION['restaurantID'], $time, $price, $_POST['payment'], $_POST['delivery']]);
        $orderID = $connection->lastInsertID();
        foreach($orderitems as $order){
            $query3=$connection->prepare('INSERT INTO ordereditems (orderID, itemID) VALUES (?,?)');
            $query3->execute([$orderID, $order]);
        }
    }
}