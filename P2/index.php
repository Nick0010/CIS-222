<?php
/*
 * @author: Nick Bartel
 * @link: https://cislinux.hfcc.edu/~njbartel/cis222/
 * Big project thing
 */
    require_once('header.php');
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
    } else
        require('home.php');
    require_once('footer.php');
}
?>