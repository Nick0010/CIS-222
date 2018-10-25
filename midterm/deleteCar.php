<?php
/**
 * User: njbartel
 * Date: 10/2/2018
 * Time: 6:15 PM
 * Link: https://cislinux.hfcc.edu/~njbartel/cis222/midterm/
 * Midterm Deletion
 * Removes a car from the database
 */

    require_once ("../../../connect.php");
	echo '<a href="index.php"> Back To Home </a>';
    $dsn="mysql:host=" . HOST . ";dbname=" . DATABASE . ";charset=" . CHARSET;
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $pdo= new PDO($dsn, USER, PASS, $opt);
		$query = "DELETE FROM midterm WHERE id=" . $_POST['id'];
		try {
			$stmt = $pdo->query($query);
			echo '<h1>Deletion Successful</h1>';
		}
		catch (PDOException $e){
			echo "<h1>ERROR: </h1> <p> $e</p>";
		}	
?>