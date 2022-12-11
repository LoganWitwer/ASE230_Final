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

    public static function history($connection){
        $query_order=$connection->prepare('SELECT userID, restaurantID, orderID, orderTime, price, paymentID, deliveryID FROM foodorder WHERE userID = ?');
        $query_order->execute([$_SESSION['ID']]);
        echo '<div class = "row justify">';
        while($result=$query_order->fetch()){
            echo '<div  id = "border">';
            $query_o=$connection->prepare('SELECT orderID, ordereditems.itemID, itemName, price FROM ordereditems LEFT JOIN items ON ordereditems.itemID = items.itemID WHERE orderID = ?');
            $query_o->execute([$result['orderID']]);
            echo ' <h6> OrderID#'.$result['orderID'].' '.$result['orderTime'].' $'.$result['price'].'</h6>';
            while($items=$query_o->fetch()){
                echo '<p>'.$items["itemName"]." $".$items["price"].'</p>';
        }
            echo '</div>';
    }
    echo '</div>';
}
}