<?php

session_start();
require_once('../Settings/settings.php');
require_once('../PaymentMethod/paymentClass.php');
require_once("../Asset/head.php");
require_once("../Asset/header.php");
Payment::read($connection, $_SESSION['ID']);
?>
<p class = "center"><a href="create.php" class = "center"> Add </a></p>;
<p class="center"><a href="../Pages/members_page.php">Back</a></p>
<?php
require_once("../Asset/footer.php");
?>