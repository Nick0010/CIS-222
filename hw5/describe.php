<?php
/**
 * User: njbartel
 * Date: 10/2/2018
 * Time: 6:15 PM
 * Homework 5 describe function
 * describes a table passed by GET
 */

require_once ("../../../connect.php");

$dsn="mysql:host=" . HOST . ";dbname=" . DATABASE . ";charset=" . CHARSET;
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
echo "<p><a href='index.php'> Back to Home</a></p>";
$pdo= new PDO($dsn, USER, PASS, $opt);
$table = $_GET['request'];
$query = 'describe ' . $table;
try {
    $stmt = $pdo->query($query);
    $results = $stmt->fetchAll();
    ?>
        <h2>
            Description of table: <?php echo $table ?>
        </h2>
    <?php

    foreach($results as $column){
        echo '<h3>Column: ' . $column['Field'] . '</h3>';
        echo '<p>Data Type: ' . $column['Type'] . '</p>';
        echo '<p>Null Allowed: ' . $column['Null'] . '</p>';
        if ( isSet($column['key']))
            echo '<p>KeyType: ' . $column['Key'] . '</p>';
        else
            echo '<p>KeyType: N/A </p>';
        if (isSet($column['Default']))
            echo '<p>Default: ' . $column['Default'] . '</p>';
        else
            echo '<p>Default: NONE </p>';
        if(!is_null($column['Extra']))
            echo '<p>Extras: ' . $column['Extra'] . '</p>';
        else
            '<p>Extras: NONE </p>';
    }
}
catch (PDOException $e){
    echo "<h1>Table [" . $table . "] Not Found</h1>";
}
echo "<p><a href='data.php?request=$table'> View Data</a></p>";

?>