<?php
/**
 * User: Njbartel
 * Date: November 8th, 2018
 * Desc: Quiz 7
 */

// 1. (4pts) Create a cookie using the PHP function and name it user_email. The cookie should contain the value saved in the $e variable.
$e = "over9000@hfcc.edu";
    setcookie('user_email', $e);

// 2. (3pts) Use the email cookie created above to send an email to that address.
//          The variables $title, $message, and $headers should be used respectively, you do not need to set these.
//          Hint: You can use the cookie directly or store the value in a variable.

    mail($_COOKIE['user_email'], $title, $message, $headers);

// 3. (3pt) Susan just wrote some code that takes user data, compares it against the database, and then logs a user in if it's valid.
//          She then put their user_id in a variable called $uid.
//          Write code below to store this user_id in a session variable that can be accessed until they sign out or the session ends.
//          Also store the email address created above in a session variable as well.
    session_start();
    $_SESSION['user'] = $uid;
    $_SESSION['email'] = $e;


// B. (1pt) Explain how the HTTP_USER_AGENT data in the $_SERVER array can be used to improve security.

/*
 * It can be used to verify the browser and ip address of a user to prevent someone else from pulling their session data pretending to be them.
 */


?>