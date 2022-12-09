<?php

session_start();
require_once('../Settings/settings.php');
require_once('../PaymentMethod/paymentClass.php');
Payment::read($connection, $_SESSION['ID']);