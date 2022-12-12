<?php 
session_start();
require_once('../Settings/settings.php');
require_once('restaurantClass.php');
?>
<h2 class = "page-title" id="pad">Restaurants</h2>
<?php
Restaurant::read($connection);

?>