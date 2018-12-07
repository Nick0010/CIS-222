<?php
/**
 * Created by PhpStorm.
 * User: njbartel
 * Date: 11/27/2018
 * Time: 5:21 PM
 * Manages a users log in status, logging them in and out as requested
 */
if (isset($_SESSION['name'])) {
    //echo "<h1> USER: " . $_SESSION['name'] . " ALREADY SIGNED IN <a href='index.php?request=signout'> SIGN OUT?</a></h1>";
    die("<h1> USER: " . $_SESSION['name'] . " ALREADY SIGNED IN <a href='index.php?request=logout'> SIGN OUT?</a></h1>");
}
elseif (isset($_POST['submitted'])){

    $query = $pdo->prepare('SELECT * FROM Customer WHERE username = :user AND active IS NULL;');
    $query->execute(array(":user" => $_POST['username']));
    $customer = $query->fetch();

    if (crypt($_POST['password'],'$1$SomebodyTooLove') == $customer['password']){
        $_SESSION['cid'] = $customer['cid'];
        $_SESSION['name'] = $customer['name'];
        $_SESSION['username'] = $customer['username'];
		echo "<h1> Welcome user: " . $_SESSION['name'] . "</h1>";
		include("home.php");
    }
    else{
		echo "<h1> Incorrect Login information</h1>";
		echo "<h2> Login</h2>
			<form method='post'>
				User Name: <input type='text' name='username' required> <br><br>
				Password: <input type='password' name='password' required> <br><br>
				<input type='hidden' name='submitted' value='1'>
				<input type='submit'>
			</form>
		<p> Not a member? <a href='index.php?request=signup'> Sign up! </a></p>";
	}
}
else{
	echo "<h2> Login</h2>
	<form method='post'>
		User Name: <input type='text' name='username' required> <br><br>
		Password: <input type='password' name='password' required> <br><br>
		<input type='hidden' name='submitted' value='1'>
		<input type='submit'>
	</form>
	<p> Not a member? <a href='index.php?request=signup'> Sign up! </a></p>";
}

?>
