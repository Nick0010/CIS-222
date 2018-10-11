<?php
require_once ("../../connect.php");
$dsn="mysql:host=" . HOST . ";dbname=" . DATABASE . ";charset=" . CHARSET;
$opt = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, USER, PASS, $opt);
$query = 'SELECT * FROM Product;';
try {
    $stmt = $pdo->query($query);
    $results = $stmt->fetchAll();
}
catch(exception $e) {
    echo "<h1>Something is very broken here, send an email to njbartel@hawkmail.hfcc.edu
                with details on how you got here</h1>";
}

?>
<div>
    <h1>Welcome to Great Lakes Barcoding!</h1>
    <div>
    <?php
    foreach ($results as $row) {

        echo "<span class=\"catalog\"><p>Product ID: " .  $row['pid'] . "</p>";
        echo "<p>Product Name: " . $row['name'] . "</p>";
        echo "<p>Product Description: " . $row['description'] . "</p>";
        echo "<p>Price: " . $row['price'] . "</p><br></span>";
    }
    ?>
    </div>
</div>
