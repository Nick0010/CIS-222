<?php
/**
 * User: Nick Bartel
 * Date: September 13th, 2018
 * Desc: Quiz 2
 */

// 3 pts
// 1. You are building a new site and have to implement a few files to do so.
//		However, there are a couple conditions for these files that must be met.
//		Write the 3 code statements needed to accomplish this task and meet the conditions.
//
//		apis/boot.php		This file imports data for our API service; it must be executed, but must not be executed more than once.
//		visuals.php	    	This file imports a cool visual effect; it could be executed, but must not be executed more than one time per page.
//		OutputStuff.php		This file dynamically generates a block of data for the page; it can be executed as often as needed.
    require_once ("apis/boot.php");
    include_once ("visuals.php");
    include ("OutputStuff.php");

// 4 pts
// 2. Create a function that accepts 3 parameters, you can name the function anything you want.
//		The first parameter should be multipled by the second, and then the third parameter should be added to that result.
//		The function should return the final result of these operations.
    function Foo($num1, $num2, $num3){
        $final = ($num1 * $num2) + $num3;
        return $final;
    }

// 3 pts
// 3. Below are a 3 variables that have been set to random numbers.
//		Call the function you defined above by passing it the three variables below, and be sure to save the result.
//		Then echo the result in a sentence, be sure the output is formated nicely in an HTML p tag.
$d6 = rand( 1, 6 );
$d20 = rand( 1, 20 );
$d100 = rand( 1, 100 );

    $result = Foo($d6, $d20, $d100);
    echo "<p>" . $result . "</p>";

// 1 pt
// Ex. Explain what chaining or sticky forms are. Should we be doing this, why or why not?
/*
 * A chained form is when A form passes data using hidden inputs to another form for later input.
 * While not inherently problematic its bad practice, as its user unfriendly and there are better methods to do the same thing
 */