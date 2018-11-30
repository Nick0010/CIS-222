<?php
/**
 * Created by PhpStorm.
 * User: njbartel
 * Date: 11/27/2018
 * Time: 5:21 PM
 */
session_start();
if (isset($_SESSION['name'])) {
    //echo "<h1> USER: " . $_SESSION['name'] . " ALREADY SIGNED IN <a href='index.php?request=signout'> SIGN OUT?</a></h1>";
    die("<h1> USER: " . $_SESSION['name'] . " ALREADY SIGNED IN <a href='index.php?request=signout'> SIGN OUT?</a></h1>");
}
else//if (isset($_SESSION['submitted'])){
{
    require_once("../../../connect.php");
    $dsn = "mysql:host=" . HOST . ";dbname=" . DATABASE . ";charset=" . CHARSET;
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $pdo = new PDO($dsn, USER, PASS, $opt);
    $query = $pdo->prepare('SELECT * FROM Customer WHERE username=:user & active IS NULL;');
    $query->execute(array(":user" => $_POST['username']));
    $customer = $query->fetch();
    if (crypt($_POST['password']) == $customer['password']){
        $_SESSION['cid'] = $customer['cid'];
        $_SESSION['name'] = $customer['name'];
        $_SESSION['username'] = $customer['username'];
    }

}

?>
<h2> Login</h2>
<form method="post">
    User Name: <input type="text" name="username" required> <br>
    Password: <input type="password" name="password" required> <br>
    <input type="hidden" name="submitted" value="1">
    <input type="submit">
</form>