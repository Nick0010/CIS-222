<?php
/**
 * Created by PhpStorm.
 * User: njbartel
 * Date: 11/27/2018
 * Time: 5:21 PM
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
</head>
<body>

<?php
if (isset($_POST['submitted'])){

    require_once ("../../../connect.php");
    $dsn="mysql:host=" . HOST . ";dbname=" . DATABASE . ";charset=" . CHARSET;
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $pdo = new PDO($dsn, USER, PASS, $opt);

    $query = $pdo->prepare('INSERT INTO Customer VALUES(NULL, :name, :username, :password, NULL);');
    //try {
        $key = array(":name" => $_POST['name'], ":username"  => $_POST['username'], ":password" => crypt($_POST['password']));
        print_r($key);
        $query->execute($key);
        echo '<h1> New user creation successful </h1>';
    //}
    //catch(exception $e) {
     //   echo "<h1>Something is very broken here, send an email to njbartel@hawkmail.hfcc.edu
     //           with details on how you got here</h1>";
    //}
}
?>
<h1> New User </h1>
<form method="post">
    Name: <input type="text" name="name" required> <br>
    User Name: <input type="text" name="username" required> <br>
    Password: <input type="password" name="password" required> <br>
    <input type="hidden" name="submitted" value="1">
    <input type="submit">
</form>

</body>
</html>

