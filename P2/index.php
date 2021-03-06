<?php
/*
 * @author: Nick Bartel
 * @link: https://cislinux.hfcc.edu/~njbartel/cis222/P2
 * Big project thing
 * Loads other pages based on a variable passed by a GET request
 */
require_once('header.php');
// made the contact handler use a post variable because nobody wants 300+ characters passed in their url bar
if (isset($_POST['request'])){
    if ($_POST['request'] == 'contactSubmit')
        require("contactHandle.php");
}
else {
    if (isset($_GET['request'])) {
        if ($_GET['request'] == 'home')
            require('home.php');
        elseif ($_GET['request'] == 'catalog')
            require('catalog.php');
        elseif ($_GET['request'] == 'contact')
            require('contact.php');
        elseif ($_GET['request'] == 'signup')
            require('signup.php');
        elseif ($_GET['request'] == 'login')
            require('login.php');
        elseif ($_GET['request'] == 'addToCart')
            require('addToCart.php');
        elseif ($_GET['request'] == 'cart')
            require('cart.php');
        elseif ($_GET['request'] == 'logout') {
            session_unset();
            echo "<h2> User logged out </h2>";
            require('home.php');
        } else
            require("404.php");
    }
    else
        require('home.php');

    require_once('footer.php');
}
?>