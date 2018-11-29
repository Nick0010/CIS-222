<?php
/**
 * Created by PhpStorm.
 * User: njbartel
 * Date: 11/27/2018
 * Time: 5:21 PM
 */
session_start();
if (isset($_SESSION['name'])){
	
	{
?>
<h2> Login</h2>
<form method="post">
    User Name: <input type="text" name="username" required> <br>
    Password: <input type="password" name="password" required> <br>
    <input type="hidden" name="submitted" value="1">
    <input type="submit">
</form>