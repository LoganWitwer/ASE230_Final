<?php

class Delivery{

    public static function create($connection, $street, $city, $state, $zip_code){
        $query=$connection->prepare('INSERT INTO deliveryaddress (userID, street, city, state, zip_code) VALUES (?,?,?,?,?)');
        $query->execute([$_SESSION['ID'], $street, $city, $state, $zip_code]);
        echo "You have successfully add your delivery address";
    }

    public static function read($connection,$ID){
        //if SESSION['role']==1; list each item with delete, and modify links that include the restaurant ID
        $query=$connection->prepare('SELECT deliveryID, `street`,`city`, `state`, `zip_code` FROM deliveryaddress WHERE userID = ?');
        $query->exucute([$ID]);
        while($result=$query->fetch()){
         echo '<table>
         <tr>
             <td>'.$result['street'].' '.$result['city'].' '.$result['state'].' '.$result['zip_code'].'</td>
             <td><a href="delete.php?id='.$result['deliveryID'].'">Delete</a></td>
             <td><a href="modify.php?id='.$result['deliveryID'].'">Modify</a></td>
         </tr>
         </table>';
     }
     }


     public static function delete($connection, $ID){
        $query=$connection->prepare('DELETE FROM deliveryaddress WHERE deliveryID =?');
        $query->execute([$ID]);
     }

     public static function update($connection, $street, $city, $state, $zip_code, $ID){
        $query=$connection->prepare('UPDATE deliveryaddress SET street = ? , city = ?, state = ?, zip_code= ? WHERE deliveryID =?');
        $query->execute([$street, $city, $state, $zip_code, $ID]);
     }

}