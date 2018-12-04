<?php
/**
 * Created by PhpStorm.
 * User: njbartel
 * Date: 11/27/2018
 * Time: 5:21 PM
 */
if (isset($_SESSION['name'])) {
    //echo "<h1> USER: " . $_SESSION['name'] . " ALREADY SIGNED IN <a href='index.php?request=signout'> SIGN OUT?</a></h1>";
    die("<h1> USER: " . $_SESSION['name'] . " ALREADY SIGNED IN <a href='index.php?request=signout'> SIGN OUT?</a></h1>");
}
elseif (isset($_POST['submitted'])){
    require_once("../../../connect.php");
    $dsn = "mysql:host=" . HOST . ";dbname=" . DATABASE . ";charset=" . CHARSET;
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
	echo "username passed: " . $_POST['username'];
    $pdo = new PDO($dsn, USER, PASS, $opt);
    $query = $pdo->prepare('SELECT * FROM Customer WHERE username LIKE \':user\' AND active IS NULL;');
    $query->execute(array(":user" => $_POST['username']));
    $customer = $query->fetch();
	print_r($customer);
	
    if (crypt($_POST['password']) == $customer['password']){
        $_SESSION['cid'] = $customer['cid'];
        $_SESSION['name'] = $customer['name'];
        $_SESSION['username'] = $customer['username'];
		echo "<h1> Welcome use: " . $_SESSION['name'];
    }
	elseif (isset($customer))
		echo "<h1> No user found by that name</h1>";
	else
		echo "<h1> Incorrect password </h1>";
		
}

?>
<h2> Login</h2>
<form method="post">
    User Name: <input type="text" name="username" required> <br><br>
    Password: <input type="password" name="password" required> <br><br>
    <input type="hidden" name="submitted" value="1">
    <input type="submit">
</form>
<p> Not a member? <a href="index.php?request=signup"> Sign up! </a>