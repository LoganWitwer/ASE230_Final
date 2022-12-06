<?php
session_start();
require_once('../Settings/settings.php');
require_once('itemClass.php');
Item::delete($connection, $_GET['id']);
?>