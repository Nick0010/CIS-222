<?php
/**
 * Created by PhpStorm.
 * User: njbartel
 * Date: 12/6/2018
 * Time: 6:43 PM
 * displays all items in a users cart and facilitates the actual ordering of the items (hopefully)
 */

    //TODO: THE ACTUAL PART WHERE IT REMOVES ITEMS FROM THE DATABASE
    //TODO: THE ACTUAL PART WHERE IT ORDERS ITEMS

    $query = $pdo->prepare("select * FROM Cart JOIN Product on Cart.pid = Product.pid where cid = :cid");
    $key = array(":cid" => $_SESSION['cid']);
    $query->execute($key);

    $cart = $query->fetchAll();
    echo "<table class=\"catalog\">";
    foreach ($cart as $item) {
        echo "<tr> <th>Product Name:  </th> <td>" . $item['name'] . "</td></tr>";
        echo "<tr><td>Product ID: </td><td>" . $item['pid'] . "</td></tr>";
        echo "<tr><td>Product Description: </td><td>" . $item['description'] . "</td></tr>";
        echo "<tr><td>Price: </td><td>" . $item['price'] . "</td></tr>";
        echo "<td>
                <form method='post'>
                <input type='submit' value='remove from cart'>
                <input type='hidden' name='request' value='remove'
                <input type='hidden' name='item' value='" . $item['pid'] . "'
                </form>";
    }
    echo "</table>";
    echo "
        <form method=post>
            <input type='hidden' name='request' value='orderAll'>
            <input type='submit' value='Order All'>
        </form>    
    "
?>