<?php
/**
 *   Nick bartel
 *   8/30/2018
 *   PHP examples
 *
 *   Grade: 10/10
 */
define("TITLE", "HW1");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
    <?php
        echo TITLE;
    ?>
    </title>
</head>
<body>
<?php
    // make some variables
    $name = "Nick Bartel";
    $show = "Steven Universe";
    $book = "The Night Angel Trilogy";
    $faveNum = 7;
    $random = rand(0,10);
    $sumNum = $faveNum + $random;
    $multNum = $faveNum * $random;
    // output the variables above
    echo "<p> My Name is: $name </p>";
    echo "<p> $name enjoys watching: $show </p>";
    echo "<p> $name enjoys reading: $book </p>";
    echo "<p> My favorite number is: $faveNum </p>";
    echo "<p> A Random number is: $random </p>";
    echo "<p> The sum of these numbers is: $sumNum</p>";
    echo "<p> The product of these numbers is: $multNum</p>";
?>
</body>
</html>
