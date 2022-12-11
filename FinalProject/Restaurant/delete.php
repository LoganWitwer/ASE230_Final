<?php
session_start();
require_once('../Settings/settings.php');
require_once('restaurantClass.php');
$delete=$_GET['id'];
Restaurant::delete($connection, $delete);
header('location: ../Restaurant/index.php');