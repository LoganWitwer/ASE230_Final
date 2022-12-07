<?php
require_once('../Settings/settings.php');

class Restaurant{

    public static function create($connection, $name, $address, $category){
        $query=$connection->prepare('INSERT INTO restaurant (`name`, `address`, `category`) VALUES (?,?,?)');
        $query->execute([$name, $address, $category]);
    }

    public static function read($connection){
       //if SESSION['role']==1; list each item with delete, and modify links that include the restaurant ID
       $query=$connection->query('SELECT `name`, `restaurantID` FROM restaurant');
       while($result=$query->fetch()){
        echo '<table>
        <tr>
            <td>'.$result['name'].'</td>
            <td><a href="delete.php?id='.$result['restaurantID'].'">Delete</a></td>
            <td><a href="modify.php?id='.$result['restaurantID'].'">Modify</a></td>
            <td><a href="../Items/index.php?id='.$result['restaurantID'].'">View Items for this Restaurant.</a></td>
        </tr>
        </table>';
    }
       //else; list each restaurant with order options
    }

    public static function delete($connection, $delete){
        $query=$connection->prepare('DELETE FROM restaurant WHERE restaurantID=?');
        $query->execute([$delete]);
        echo 'Successfully deleted.';
    }

    public static function modify($connection, $name, $address, $category){
        $query=$connection->prepare('UPDATE restaurant SET `name` = ?, `address` = ?, `category` = ?');
        $query->execute([$name, $address, $category]);
    }

}