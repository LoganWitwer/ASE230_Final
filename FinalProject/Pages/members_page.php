<?php
session_start();
require_once("../Asset/head.php");
require_once("../Asset/header.php");
require_once('../Restaurant/restaurantClass.php');
$userID = $_SESSION['ID'];
$userName = $_SESSION['name'];
if($_SESSION['logged']==false){
    header('location: visitor_page.php');
}
?>

<body style="background-color: light blue;">
    <h2><?= 'Hello '.$userName.'!'?></h2>
    <div class="row">
        
            <?= Restaurant::read($connection, $_SESSION['role'])?>
        
    </div>
    <br>

</body>

<?php
require_once("../Asset/footer.php");
?>