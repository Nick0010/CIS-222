<?php
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
        echo "</table>";
    }
    ?>
</div>
