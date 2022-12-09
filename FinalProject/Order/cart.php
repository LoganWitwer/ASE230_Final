<?php
session_start();
array_push($_SESSION['cart'],$_GET['id']);
header('location: ../Restaurant/detail.php?id='.$_GET['restaurant'].'');