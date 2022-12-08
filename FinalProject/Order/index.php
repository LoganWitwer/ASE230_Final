<?php

$orderitems = [0,1,2];
//$_SESSION['cart'];

foreach($orderitems as $order){
    $query=$connection->query('SELECT * FROM items WHERE itemID = $order');
    $result=$query->fetch();

    print_r($result);


}