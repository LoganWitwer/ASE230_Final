<?php
require_once('../Settings/settings.php');
require_once('../Order/orderClass.php');
require_once("../Asset/head.php");
require_once("../Asset/header.php");
session_start();
?>
<body>
<?php
Order::history($connection);
?>
<p id="rest"><a href="../Pages/members_page.php">Back</a></p>
<?php
require_once("../Asset/footer.php");
?>
</body>