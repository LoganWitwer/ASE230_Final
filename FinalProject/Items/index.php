<?php
session_start();
require_once('../Settings/settings.php');
require_once('itemClass.php');
Item::read($connection);
$restaurant=$_GET['id'];
?>
<a href="create.php?id=<?$restaurant?>">Create Item</a>