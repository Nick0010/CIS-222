<?php
/**
 * User: njbartel
 * Date: 10/2/2018
 * Time: 6:15 PM
 * Link: https://cislinux.hfcc.edu/~njbartel/cis222/midterm/
 * Midterm Index page
 * inserts entries into a database of cars
 */

    require_once ("../../../connect.php");

    $dsn="mysql:host=" . HOST . ";dbname=" . DATABASE . ";charset=" . CHARSET;
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $pdo= new PDO($dsn, USER, PASS, $opt);
	if (isSet($_POST['filled'])){
		$query = "INSERT INTO midterm VALUES(NULL, '" .$_POST['make'] . "', '" . $_POST['model'] . "', " . $_POST['price'] . ", " . $_POST['year'] . ")";
		try {
			$stmt = $pdo->query($query);
			echo '<h1>Insertion Successful</h1>';
		}
		catch (PDOException $e){
			echo "<h1>UNSPECIFIED ERROR</h1>";
		}	
	}
	else{
?>
	<a href="index.php"> Back To Home </a>
		<h2>
			Insert a new entry
		</h2>
		
		<form method='post'>
			<p>Make: <input type='text' name='make'></p>
			<p>Model: <input type='text' name='model'></p>
			<p>Price: <input type='text' name='price'></p>
			<p>Year: <input type='text' name='year'></p>
			<input type='hidden' name='filled' value=1>
			<input type='submit'>
		</form>
<?php
	}
?>