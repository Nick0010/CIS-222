<?
/**
 * User: Njbartel
 * Date: November 15th, 2018
 * Desc: Quiz 8
 */

// 1. (2pts) In a comment, define what an XSS attack is.
    // An XSS or cross site scripting attack is when a user "injects" a malicious script into a webpage through offered input.
    // this injected code has access to whatever resources would be available to any script executed by the page since in an XSS attack there is no verification

// 2. (1pts) I have an unknown value in the $unknown variable. Check to see if it is an array, if so echo the $message string.
    if(is_array($unknown))
        echo $message;

// 3. (1pts) Check to see if the $unknown variable is a string, if so echo the $message string.
    if(is_string($unknown))
        echo $message;


// 4. (1pts) Check to see if the $unknown variable is a number, if so echo the $message string.
    if(is_numeric($unknown))
        echo $message;

// 5. (1pts) Check to see if the $unknown variable is null, if so echo the $message string.
    if (is_null($unknown))
        echo $message;

// 6. (4pts) Use a php function to ensure every character in the $str string is lowercase.
//              Then validate if this string is an email or not using the filter_var function.

    filter_var(strtolower($str) , FILTER_VALIDATE_EMAIL);

// B1. (1pt) Create a function (or class) that can accept at least one parameter of a password and return it encrypted/hashed.

function encryptPassword($pass){
    $crypt = password_hash($pass);
    return $crypt;
}

// B2. (1pt) Assume you have a password saved in $pass. Use the method you created above to hash it and save it in the $encp variable.
    $encp = encryptPassword($pass);

// B3. (1pt) Define what a SQL Injection hack is.

// sql injection is similar to an xss attack in that malicious code is injected via user input
// specifically its when a user forces a second query to be executed returning additional, often sensitive information
