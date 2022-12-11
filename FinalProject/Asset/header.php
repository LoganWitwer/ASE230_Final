<?php
require_once("../Asset/head.php");
?>
<header>
    <h2>Tofoo</h2>
</header>

<?php
if(!isset($_SESSION['role'])){

} else {
    echo '<nav>';
    if($_SESSION['role']==1){
        echo '<ul style="list-style-type: none;">
        <li style="display: inline;"><button type="button" class="btn btn-primary"><a href="../Restaurant/index.php"> Add Restaurants and Items </a></button></li>
        <li style="display: inline;"><button type="button" class="btn btn-primary"><a href="../Order/checkout.php"> Place Order </a></button></li>
        <li style="display: inline;"><button type="button" class="btn btn-primary"><a href="../Deliveryaddress/read.php"> Add Delivery Address </a></button></li>
        <li style="display: inline;"><button type="button" class="btn btn-primary"><a href="../PaymentMethod/read.php"> Add Payment Card </a></button></li>
        <li style="display: inline;"><button type="button" class="btn btn-primary"><a href="../Order/history.php"> Order History</a></button></li>
        <li style="display: inline;"><button type="button" class="btn btn-danger"><a href="../Auth/signout.php"> Sign out</a></button></li>
        </ul>';
    } else {
        echo    '<ul>
        <li style="display: inline;"><button type="button" class="btn btn-primary"><a href="../Order/checkout.php"> Place Order </a></button></li>
        <li style="display: inline;"><button type="button" class="btn btn-primary"><a href="../Deliveryaddress/read.php"> Add Delivery Address </a></button></li>
        <li style="display: inline;"><button type="button" class="btn btn-primary"><a href="../PaymentMethod/read.php"> Add Payment Card </a></button></li>
        <li style="display: inline;"><button type="button" class="btn btn-primary"><a href="../Order/history.php"> Order History</a></button></li>
        <li style="display: inline;"><button type="button" class="btn btn-danger"><a href="../Auth/signout.php"> Sign out</a></button></li>
        </ul>';
    }
    echo '</nav>';
}