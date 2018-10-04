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

$pdo= new PDO($dsn, USER, PASS, $opt);

$query = 'show tables';
$stmt = $pdo->query($query);
$results= $stmt->fetchAll();
?>
    <h2>
        Detected tables:
    </h2>
<?php
foreach($results as $row){
    echo '<p><a href="describe.php?request=' . $row['Tables_in_njbartel'] . '">' . $row['Tables_in_njbartel'] . '</a></p>';
}

?>