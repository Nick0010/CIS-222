<?php
/**
 * User: Nick Bartel
 * Date: September 6th, 2018
 * Desc: Quiz 1
 *
 * Grade: 10 / 10
 */

// 2 pts
// 1. Make any changes needed to line 17 of this snippet so that the final price is correct and dynamically using the variables above it.
$price = 18;
$taxrate = 0.07;
$final = $price + ($price * $taxrate);
echo "The final price is $" . $final;


// 3 pts
// 2. Define an array called $classes and populate it with strings containing the classes you have taken at HFC (at least 3 or 4).
//		Then use a foreach loop to step through that array and echo their contents, don't forget to add new lines with <br> tags.
$classes = array("c++", "sql", "Unix", "Visual c#");
foreach ($classes as $class)
    echo "<p> $class </p>";

// 1 pts
// 3. We want to start collecting email addresses to add to our mailing list.
//		Finish the form below so that it contains a text input to enter a users email address, and a submit button that posts the data to a add_email_subscriber.php page.
//		You do not need to handle the data or response of the form, just finish creating the form itself.
?>

<form action="add_email_subscriber.php">
	<input type="hidden" name="action" value="addToMailingList" >
    <input type="text" name="email">
    <input type="submit" value="Submit">
</form>

<?php


// 2 pts
// 4. Assume the $name variable is already set to the string "Keanu Reeves"
// Write the last line of this snippet using the concatenation operator.
// Once complete, the data sent to the browser should look like this....
// <p>The Keanu Reeves</p>

    echo "<p> The " . $name . "</p>";

// 2 pts
// 5. Define a constant called TITLE and set it to the following string.
// "The Matrix"

define("TITLE", "The Matrix");

// 1 pt
// Ex: Last class, what did I say was the most useful function used for debugging?
Var_dump($foo);

?>
