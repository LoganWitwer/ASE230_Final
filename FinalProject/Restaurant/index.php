<?php 
session_start();
require_once('../Settings/settings.php');
require_once('restaurantClass.php');
Restaurant::read($connection);