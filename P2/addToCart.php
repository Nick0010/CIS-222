<?php
/**
 * Created by PhpStorm.
 * User: njbartel
 * Date: 12/6/2018
 * Time: 6:00 PM
 * adds an item to the users cart
 */
if (!isset($_SESSION["name"])){
    echo "<h1>Please <a href='index.php?request=login'> To order a printer!</a></h1>";
    echo "<h2> Not a member yet? <a href='index.php?request=signup'>Sign up!</a>";
    echo "<h3> Not convinced yet? <a href='index.php?request=catalog'> Check out our products page!</a></h3>";
}
else{
    $query = $pdo->prepare("INSERT INTO Cart VALUES(NULL, :cid, :pid)");
    $key = array(":cid" => $_SESSION['cid'], ":pid" => $_GET['itemNum']);
    try {
        $query->execute($key);
        echo "<h1> Item succesfully added to cart!</h1>";
        echo "<h2><a href='index.php?request=catalog'>Continue shopping?</a></h2>";
    }
    catch(exception $e){

    }
}