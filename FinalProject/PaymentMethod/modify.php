


<?php
session_start();
require_once('../Settings/settings.php');
require_once('../PaymentMethod/paymentClass.php');
require_once("../Asset/head.php");
require_once("../Asset/header.php");

if(count($_POST)>0){
    $name = $_POST['cardname'];
    $cardtype = $_POST['type'];
    $number = $_POST['number'];
    $expire = $_POST['expire'];
    $cvc = $_POST['cvc'];
    Payment::update($connection, $name, $cardtype, $number, $expire, $cvc,$_GET['id']);
}
?>

<div class ="center-screen">
<h2 class = "page-title" id="pad">Modify Payment</h2>
<form method="POST">
    Name on Card: <input type="text" name="cardname" /><br>
    CardType: <input type="text" name="type" /><br>
    CardNumber: <input type="text" name="number" /><br>
    Expiration Date: <input type="date" name="expire" min= <?=date("Y-m-d")?> max="2040-12-31" /><br>
    cvc: <input type="text" name="cvc" /><br>
	<input type="submit" value="Submit" />
</form>

<p id="rest"><a href="../Pages/members_page.php">Back</a></p>

</div>

<?php
require_once("../Asset/footer.php");
?>