<?php
session_start();
array_push($_SESSION['cart'],$_GET['id']);
echo 'Added to cart';

echo '<a href="../Restaurant/detail.php?id='.$_GET['restaurant'].'"> Back </a>';