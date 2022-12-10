<?php
require_once('../Settings/settings.php');
require_once('../PaymentMethod/paymentClass.php');
require_once('../Deliveryaddress/deliveryClass.php');
require_once('../Order/orderClass.php');
session_start();
$orderitems = $_SESSION['cart'];

echo $_SESSION['ID']. " ";
//$_SESSION['cart'];
$price = 0;
foreach($orderitems as $order){
    $query=$connection->prepare('SELECT * FROM items WHERE itemID = ?');
    $query-> execute([$order]);
    $result=$query->fetch();
    $price += $result['price'];
    echo $result['itemID'] ." ".$result['itemName'] ." ".$result['price'];
    echo '<br>';
}

    $query1=$connection->prepare('SELECT * FROM paymentMethod WHERE userID = ?');
    $query1-> execute([$_SESSION['ID']]);

    if(count($_POST)>0){
        $payment = $_POST['payment'];
        $delivery = $_POST['delivery'];
        Order::create($connection, $price, $payment, $delivery, $orderitems);

    }

?>

<form method="POST">
    <label for="payment">Payment Address:</label>
    <select id="payment" name="payment">
    <?php
    while($result1=$query1->fetch()){
        echo '<option value="'.$result1['paymentID'].'">'.$result1['name'].', '. $result1['cardNumber'].'</option>';
    }
    ?>
    </select><br><br>

    <label for="delivery">Delivery Method:</label>
    <select id="delivery" name="delivery">
    <?php
    $query2=$connection->prepare('SELECT * FROM deliveryAddress WHERE userID = ?');
    $query2-> execute([$_SESSION['ID']]);
    while($result2=$query2->fetch()){
        echo '<option value="'.$result2['deliveryID'].'">'.$result2['street'].', '. $result2['state'].'</option>';
    }
    ?>
    </select><br><br>
    <input type="submit">

</form>

