<?php

session_start();
require_once('../Settings/settings.php');
require_once('../PaymentMethod/paymentClass.php');
print_r($_GET['id']);
Payment::delete($connection,$_GET['id']);
header('location: ../paymentMethod/read.php');