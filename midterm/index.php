<?php
/**
 * User: njbartel
 * Date: 10/2/2018
 * Time: 6:15 PM
 * Link: https://cislinux.hfcc.edu/~njbartel/cis222/midterm/
 * Midterm Index page
 * queries a database to find all cars listed in it
 */

    require_once ("../../../connect.php");

    $dsn="mysql:host=" . HOST . ";dbname=" . DATABASE . ";charset=" . CHARSET;
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $pdo= new PDO($dsn, USER, PASS, $opt);

    $query = 'SELECT * FROM midterm';
    $stmt = $pdo->query($query);
    $results= $stmt->fetchAll();
?>
    <h2>
        Found Cars:
    </h2>
<?php
	$count = 0;
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
			$count++;
        }
    }
	echo "<p> $count cars found</p>";
	echo '<span><a href="insertCar.php"> Insert a car </a> | 
	<a href="updateCar.php"> Update an entry </a> | 
	<a href="deleteCar.php"> Remove an entry </a></span>';
?>