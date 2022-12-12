<?php
require_once("../Asset/head.php");
require_once("../Asset/header.php");
session_start();
array_push($_SESSION['cart'],$_GET['id']);
?>

<div class = "center-screen border" >
<h2>Added to cart</h2>
<p class = "page-title"><a href="../Restaurant/detail.php?id=<?=$_GET['restaurant']?>"> Back </a></p>
</div>

<?php
require_once("../Asset/footer.php");
?>
