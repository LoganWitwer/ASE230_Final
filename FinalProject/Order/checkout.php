<?php
require_once('../Settings/settings.php');
require_once('../PaymentMethod/paymentClass.php');
require_once('../Deliveryaddress/deliveryClass.php');
require_once('../Order/orderClass.php');
require_once("../Asset/head.php");
require_once("../Asset/header.php");
session_start();
$orderitems = $_SESSION['cart'];
?>

<div  id = "border" class = "checkout border" >
<h2 class = "page-title" id="pad">Checkout</h2>
<?php

//$_SESSION['cart'];
$price = 0;
foreach($orderitems as $order){
    $query=$connection->prepare('SELECT * FROM items WHERE itemID = ?');
    $query-> execute([$order]);
    $result=$query->fetch();
    $price += $result['price'];
    echo '<div>
            <div>
                <h5>'.$result['itemName']." $".$result['price'].'</h5>
            </div>
          </div>';
}
    echo " <h5> Total Price: $" . $price .'</h5> <br>';

    $query1=$connection->prepare('SELECT * FROM paymentMethod WHERE userID = ?');
    $query1-> execute([$_SESSION['ID']]);

    if(isset($_POST['action']) && $_POST['action'] == 'Submit Order'){
        $payment = $_POST['payment'];
        $delivery = $_POST['delivery'];
        Order::create($connection, $price, $payment, $delivery, $orderitems);
        echo 'Order has been placed';
        $_SESSION['cart'] = [];
    }
    else if(isset($_POST['action']) && $_POST['action'] == 'Empty Cart'){
        $_SESSION['cart'] = [];
        header('location: ../Order/checkout.php');
    }

?>

<form method="POST">
    <label for="payment">Payment Method:</label>
    <select id="payment" name="payment">
    <?php
    while($result1=$query1->fetch()){
        echo '<option value="'.$result1['paymentID'].'">'.$result1['name'].', '. $result1['cardNumber'].'</option>';
    }
    ?>
    </select><br>

    <label for="delivery">Delivery Address:</label>
    <select id="delivery" name="delivery">
    <?php
    $query2=$connection->prepare('SELECT * FROM deliveryAddress WHERE userID = ?');
    $query2-> execute([$_SESSION['ID']]);
    while($result2=$query2->fetch()){
        echo '<option value="'.$result2['deliveryID'].'">'.$result2['street'].', '. $result2['state'].'</option>';
    }
    ?>
    </select><br><br>
    <input type="submit" name="action" value = "Submit Order">
    <input type="submit" name="action" value = "Empty Cart">

</form>
<p id="rest"><a href="../Pages/members_page.php">Back</a></p>
</div>


<?php
require_once("../Asset/footer.php");
?>
