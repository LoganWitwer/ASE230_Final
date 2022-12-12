<?php

session_start();
require_once('../Settings/settings.php');
require_once('../Deliveryaddress/deliveryClass.php');
require_once("../Asset/head.php");
require_once("../Asset/header.php");
?>
<h2 class = "page-title">Delivery Address</h2>
<?php
Delivery::read($connection,$_SESSION['ID']);
echo '<p class="center"><a href="create.php" > Add </a></p>
    <p class="center"><a href="../Pages/members_page.php">Back</a></p>';
require_once("../Asset/footer.php");
?>