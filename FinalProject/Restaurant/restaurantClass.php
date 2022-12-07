<?php
require_once('../Settings/settings.php');

class Restaurant{

    public static function create($connection, $name, $address, $category){
        $query=$connection->prepare('INSERT INTO restaurant (`name`, `address`, `category`) VALUES (?,?,?)');
        $query->execute([$name, $address, $category]);
    }

    public static function read($connection, $role){
        //if SESSION['role']==1 list each item with delete, and modify links that include the restaurant ID
        if($role==1){
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
        } /*else {//else list each restaurant with order options
            $query=$connection->query('SELECT `name`, `restaurantID` FROM restaurant');
            while($result=$query->fetch()){
                echo '<table>
                <tr>
                    <td>'.$result['name'].'</td>
                    <td><a href="../Items/index.php?id='.$result['restaurantID'].'">Order from this restaurant.</a></td>
                </tr>
                </table>';
            }
        }*/
       
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