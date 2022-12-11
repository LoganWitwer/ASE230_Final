<?php
session_start();
require_once('../Settings/settings.php');
require_once('restaurantClass.php');
require_once("../Asset/head.php");
require_once("../Asset/header.php");
$restaurantID = $_GET['id'];
?>

<body>
<?php

Restaurant::detail($connection, $restaurantID);
if(count($_POST)>0){
    array_push($_SESSION['cart'], $_POST['submit']);
}
print_r($_SESSION['cart']);
?>
</body>

<?php
require_once("../Asset/footer.php");
?>