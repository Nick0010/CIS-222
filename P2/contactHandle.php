<?php
/**
 * Created by PhpStorm.
 * User: njbartel
 * Date: 10/9/2018
 * Time: 5:57 PM
 * Handles contact information from contact.php
 */

$query = $pdo->prepare("INSERT INTO Contact VALUES(NULL, :name, :email, :message)");

try {
    $query->execute(array(':name' => $_POST['name'], ':email' => $_POST['email'], ':message' => $_POST['message']));
    echo '<h2> Thank you for contacting us</h2>';
    echo '<p>someone will follow up with your request as soon as possible </p>';
}
catch(exception $e) {
    echo "<h1>Something is very broken here, send an email to njbartel@hawkmail.hfcc.edu
    with details on how you got here</h1>";
}
?>