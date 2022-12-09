<?php
require_once('../Settings/settings.php');

class Restaurant{

    public static function create($connection, $name, $address, $category, $description){
        $query=$connection->prepare('INSERT INTO restaurant (`name`, `address`, `category`, `description`) VALUES (?,?,?,?)');
        $query->execute([$name, $address, $category, $description]);
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
        } else {//else list each restaurant with order options
            $query=$connection->query('SELECT `name`, `restaurantID` FROM restaurant');
            while($result=$query->fetch()){
                echo '<table>
                <tr>
                    <td>'.$result['name'].'</td>
                    <td><a href="../Restaurant/detail.php?id='.$result['restaurantID'].'">Order from this restaurant.</a></td>
                </tr>
                </table>';
            }
        }
       
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

    public static function detail($connection, $restaurantID){
        
        $query=$connection->prepare('SELECT `name`, `address`, `category`, `description` FROM restaurant WHERE `restaurantID`=?');
        $query->execute([$restaurantID]);
        $query2=$connection->prepare('SELECT `description`, `price`, `itemName`, `itemID` FROM items WHERE `restaurantID`=?');
        $query2->execute([$restaurantID]);
        while($result=$query->fetch()){
            echo '<h1>'.$result['name'].'</h1><br>'.$result['category'].'<br>'.$result['description'].'<br>'.$result['address'].'<hr />';
        }
        echo '<table>';
        while($result2=$query2->fetch()){
            echo '
            <tr>
            <td>'.$result2['itemName'].'</td>
            <td>'.$result2['description'].'</td>
            <td>'.$result2['price'].'</td>
            <td><a href="../Order/cart.php?id='.$result2['itemID'].'&&restaurant='.$restaurantID.'">Add to cart.</a></td>
            </tr>';
            
        }
        echo '<tr><td><a href="../Pages/members_page.php">Back</a></td></tr></table>';
        
    }

}