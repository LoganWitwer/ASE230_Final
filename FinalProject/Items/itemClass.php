<?php
require_once('../Settings/settings.php');

class Item{
    public static function create($connection, $description, $price, $itemName, $restaurant){
        $query=$connection->prepare('INSERT INTO items (`description`, `price`, `itemName`, `restaurantID`) VALUES (?,?,?,?)');
        $query->execute([$description, $price, $itemName, $restaurant]);
    }

    public static function read($connection){
        //if SESSION['role']==1; list each item using the restaurant id and include a delete and modify option that passes the itemID
        $query=$connection->query('SELECT `itemName`, `description`, `price`, `itemID` FROM items');
        while($result=$query->fetch()){
        echo '<table>
            <tr>
                <td>'.$result['itemName'].'</td>
                <td><a href="delete.php?id='.$result['itemID'].'">Delete</a></td>
                <td><a href="modify.php?id='.$result['itemID'].'">Modify</a></td>
            </tr>
            </table>';
        }
        //else; list each item with order options
        }

        public static function delete($connection, $delete){
            $query=$connection->prepare('DELETE FROM items WHERE itemID=?');
            $query->execute([$delete]);
            echo 'Successfully deleted.';
        }
    
        public static function modify($connection, $description, $price, $itemName){
            $query=$connection->prepare('UPDATE items SET `description` = ?, `price` = ?, `itemName` = ?');
            $query->execute([$description, $price, $itemName]);
        }
}