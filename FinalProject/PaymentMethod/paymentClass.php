<?php

class Payment{

    public static function create($connection, $name, $cardtype, $number, $expire, $cvc){
        $query=$connection->prepare('INSERT INTO paymentmethod (userID ,name, cardType, cardNumber, expirationDate, cvc) VALUES (?,?,?,?,?,?)');
        $query->execute([$_SESSION['ID'],$name, $cardtype, $number, $expire, $cvc]);
        echo "Payment method successfully inputed";
    }

    public static function read($connection, $ID){
        //if SESSION['role']==1; list each item with delete, and modify links that include the restaurant ID
        $query=$connection->prepare('SELECT `paymentID`,`name`, `cardType`, `cardNumber` FROM paymentmethod WHERE userID = ?');
        $query->execute([$ID]);
        echo '<div class = "row justify">';
        while($result=$query->fetch()){
         echo '
                <div class = "border">
                <div>
                    <h5>'.$result['name'].' '.preg_replace( "#(.*?)(\d{4})$#", "$2", $result['cardNumber']).'</h5>
                    <button type="button" class="btn btn-info"><a href="delete.php?id='.$result['paymentID'].'">Delete</a></button>
                    <button type="button" class="btn btn-info"><a href="modify.php?id='.$result['paymentID'].'">Modify</a></button>
                </div>
                </div>
         ';
     }
     echo '</div>';
     }

     public static function delete($connection, $ID){
        $query=$connection->prepare('DELETE FROM paymentmethod WHERE paymentID =?');
        $query->execute([$ID]);
     }

     public static function update($connection, $name, $cardtype, $number, $expire, $cvc, $ID){
        $query=$connection->prepare('UPDATE paymentmethod SET name = ? , cardType = ?, cardNumber = ?, expirationDate= ?, cvc = ? WHERE paymentID =?');
        $query->execute([$name, $cardtype, $number, $expire, $cvc, $ID]);
     }


}