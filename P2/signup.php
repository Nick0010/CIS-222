<?php
/**
 * Created by PhpStorm.
 * User: njbartel
 * Date: 11/27/2018
 * Time: 5:21 PM
 * adds a user to the database so they can log in and buy stuff
 */

?>

<?php
if (isset($_POST['submitted'])){
    

    $query = $pdo->prepare('INSERT INTO Customer VALUES(NULL, :name, :username, :password, NULL, :address);');
    try {
        $key = array(":name" => $_POST['name'], ":username"  => strtolower($_POST['username']), ":password" => crypt($_POST['password'],'$1$SomebodyTooLove'), ':address' => $_POST['address']);
        $query->execute($key);
        echo '<h1> New user creation successful </h1>';
    }
    catch(exception $e) {
        echo "<h1>Something is very broken here, send an email to njbartel@hawkmail.hfcc.edu
                with details on how you got here</h1>";
    }
}
?>
<h2> New User </h2>
<form method="post">
    Name: <input type="text" name="name" required> <br><br>
    User Name: <input type="text" name="username" required> <br><br>
    Password: <input type="password" name="password" required> <br><br>
    Address: <input type ="text" name="address" required> <br><br>
    <input type="hidden" name="submitted" value="1">
    <input type="submit">
</form>


