<?php

session_start();
require_once('../Settings/settings.php');
require_once('../Deliveryaddress/deliveryClass.php');
print_r($_GET['id']);
Delivery::delete($connection,$_GET['id']);
header('location: ../Deliveryaddress/read.php');