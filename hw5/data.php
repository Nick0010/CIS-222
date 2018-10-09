<?php
/**
 * User: njbartel
 * Date: 10/2/2018
 * Time: 6:15 PM
 * Homework 5 index page
 * Shows Data from a table specified in a GET variable
 */

require_once ("../../../connect.php");

$dsn="mysql:host=" . HOST . ";dbname=" . DATABASE . ";charset=" . CHARSET;
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo= new PDO($dsn, USER, PASS, $opt);
$table = $_GET['request'];

echo "<p><a href='index.php'> Back to Home</a></p>";
echo "<p><a href='describe.php?request=$table'> Back to Describe</a></p>";

$query = 'SELECT * FROM ' . $table;
try {
    $stmt = $pdo->query($query);
    $results = $stmt->fetchAll();
    ?>
    <h2>
        Data for Table: <?php echo $table ?>
    </h2>
    <?php
    foreach($results as $row){
        if (is_null($row)){
            echo '<h1>NO TABLE DATA FOUND</h1>';
        }
        else{
            echo '<br>';
            foreach ($row as $field => $data) {
                echo "<p> $field: $data</p>";
            }
            echo "_______________________________________________";
        }
    }
}
catch (PDOException $e){
    echo "<h1>Table [" . $table . "] Not Found</h1>";
}

?>