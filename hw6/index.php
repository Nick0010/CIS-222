<?php
/**
 * Created by PhpStorm.
 * User: njbartel
 * Date: 10/25/2018
 * Time: 5:30 PM
 * Grade: 10 / 10
 */
require_once ("../../../connect.php");

$dsn="mysql:host=" . HOST . ";dbname=" . DATABASE . ";charset=" . CHARSET;
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$pdo= new PDO($dsn, USER, PASS, $opt);



if (isset($_POST['up'])){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['fileUp']['name']);
    if ($_FILES["fileUp"]["size"] > 1000000) {
        echo "Sorry, your file is too large.";
        die;
    }
    mail("admin@somesite.com", "FILE UPLOADED", $_FILES['fileUp']['name'] . " was uploaded to the server");
    if (move_uploaded_file($_FILES["fileUp"]["tmp_name"], $target_file)) {
        $query = 'INSERT INTO hw6 VALUES(null, "' . $_FILES['fileUp']['name'] . '")';
        $stmt = $pdo->query($query);
        echo "The file " . basename($_FILES["fileUp"]["name"]) . " has been uploaded.";
    }
    else {
        echo "Sorry, there was an error uploading your file.";
        die;
    }
    $query = 'SELECT * FROM hw6';
    $stmt = $pdo->query($query);
    $results= $stmt->fetchAll();
    foreach($results as $row) {
        echo '<br>';
        echo "<p> " . $row['id'] . ": <a href=\"uploads/" . $row['file'] ." \" download>" . $row['file'] . "</p>";

    }
}
else {
    echo "<form method='post' enctype=\"multipart/form-data\">
        <input type='file' name='fileUp'>
        <input type='hidden' name='up' value='TRUE'>
        <input type='submit' value='upload'>
      </form>";
}
?>
