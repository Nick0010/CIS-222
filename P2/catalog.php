<?php
/**
 * Created by PhpStorm.
 * User: njbartel
 * Date: 10/9/2018
 * Time: 5:57 PM
 * Lists all products in a database
 */
$query = $pdo->prepare('SELECT * FROM Product;');
try {
    $query->execute();
    $results = $query->fetchAll();
}
catch(exception $e) {
    echo "<h1>Something is very broken here, send an email to njbartel@hawkmail.hfcc.edu
                with details on how you got here</h1>";
}

?>
<div>
    <h1>Welcome to Great Lakes Barcoding!</h1>
    <?php
    foreach ($results as $row) {
        echo "<table class=\"catalog\">";
        echo "<tr> <th>Product Name:  </th> <td>" . $row['name'] . "</td></tr>";
        echo "<tr><td>Product ID: </td><td>" .  $row['pid'] . "</td></tr>";
        echo "<tr><td>Product Description: </td><td>" . $row['description'] . "</td></tr>";
        echo "<tr><td>Price: </td><td>" . $row['price'] . "</td></tr>";
        echo "<tr><td>
                <form method='GET' target='index.php'>
                    <input type='hidden' name='itemNum' value= " . $row['pid'] . ">
                    <input type='hidden' name='request' value='addToCart'>
                    <input type='submit' value='Add To Cart'>
                </form>
             </td></tr>";
        echo "</table>";
    }
    ?>
</div>
