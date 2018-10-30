<?php
/*
 * @author: Nick Bartel
 * @link: https://cislinux.hfcc.edu/~njbartel/cis222/P1
 * Big project thing
 *
 * Grade: 85 / 150
 * Link above does not work.
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
