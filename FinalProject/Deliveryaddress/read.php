<?php

session_start();
require_once('../Settings/settings.php');
require_once('../Deliveryaddress/deliveryClass.php');
Delivery::read($connection,$_SESSION['ID']);
echo '<a href="create.php"> Add </a>';