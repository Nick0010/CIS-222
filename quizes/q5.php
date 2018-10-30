<?php
/**
 * User: Nick Bartel
 * Date: October 25th, 2018
 * Desc: Quiz 5
 *
 * Grade: 11 / 10
 */
try {
// 1. (2pts) You have an email phone number in the $sms var.
// Using the mail function, send this person an SMS message.
// The $body and $headers vars below should be used.
// Hint: Do not forget to leave the title blank.
    $body = "Team Valor Alert!";
    $headers = "";
//    $sms = 5555555555;
    mail($sms, "", $body, $headers);


// 2. (3pts) Echo a JS alert using PHP. The JS alert should work and display the following message.
// "Do Not Eat At Joes"

    echo "<script>alert('Do Not Eat At Joes'); </script>";

// 3. (1pts) Use the header function to send your users to the following address.
// http://reddit.com/r/litecoin

    header("Location: http://reddit.com/r/litecoin");

// 4. (2pt) Below is some PHP code. Surpress the error messages from all used functions.
    $filename = 'activity.log';
    $addedLog = @file_set_contents($filename, @file_get_contents($filename) . "New log entry\n");


// 5. (2pts) Write a try/catch statement that wraps all of the code in questions 1 thorugh 4.
//	If the try fails, in the catch print a message that reads "I apologize for this error."
}
catch(exception $e){
    echo "I apologize for this error";
}

// B1. (3pt each) Using the ini_set function, change any three settings. The values used must be valid.
ini_set('display_errors', 1);

// B2. (1pt each) Name the function I mentioned was so powerful it was like magic last session.

// I was really really tired thursday anad have no idea what was even discussed
