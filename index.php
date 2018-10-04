<?php
/*
 * Nick Bartel
 * web link @: https://cislinux.hfcc.edu/~njbartel/cis222/
 * Big project thing
 */
    require_once('header.php');
    if (isset($_GET['request'])) {
        if ($_GET['request'] == 'home')
            require('home.php');
        elseif ($_GET['request'] == 'contact')
            require('contact.php');

    }
    else
        require('home.php');
    require_once ('footer.php');

?>