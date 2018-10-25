<?php
/**
 * User: njbartel
 * Date: 10/2/2018
 * Time: 6:15 PM
 * Link: https://cislinux.hfcc.edu/~njbartel/cis222/midterm/
 * Midterm Update page
 * updates entries into a database of cars
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
	if (isSet($_POST['filled'])){
		$query = "UPDATE midterm SET make='" . $_POST['make'] . "', model='" . $_POST['model'] . "', price=" . $_POST['price'] . ", year=" . $_POST['year'] .  "  WHERE id=" . $_POST['id'];
		try {
			$stmt = $pdo->query($query);
			echo '<h1>Update Successful</h1>';
		}
		catch (PDOException $e){
			echo "<h1>ERROR: </h1> <p> $e</p>";
		}	
	}
	else{
?>
		<h2>
			Update an entry
		</h2>
		
		<form method='post'>
			<p>Make: <input type='text' name='make' value= <?php echo $_POST['make']; ?>></p>
			<p>Model: <input type='text' name='model' value= <?php echo $_POST['model']; ?>></p>
			<p>Price: <input type='text' name='price' value= <?php echo $_POST['price']; ?>></p>
			<p>Year: <input type='text' name='year' value= <?php echo $_POST['year']; ?>></p>
			<input type='hidden' name='id' value= <?php echo $_POST['id']; ?>>
			<input type='hidden' name='filled' value=1>
			<input type='submit'>
		</form>
<?php
	}
?>