<?php
/**
 * Created by PhpStorm.
 * User: njbartel
 * Date: 11/13/2018
 * Time: 5:38 PM
 * Grade: 10 / 10
 *
 */
session_start();
if (isset($_SESSION['count'])){
    $_SESSION['count']++;
}
else
    $_SESSION['count'] = 0;

if (isset($_GET['cKey'])){
    setcookie($_GET['cKey'], $_GET['cVal']);
}

if (isset($_GET['bgcolor'])){
    setcookie('bgColor', $_GET['bgcolor']);
    echo "<body style='background-color: " . $_COOKIE['bgColor'] . "'>";
}
else {
    if (isset($_COOKIE['bgColor'])){
        echo "<body style='background-color: " . $_COOKIE['bgColor'] . "'>";
    }
    else
        echo "<body>";
}

?>
<form method="get">
    <input type="radio" name="bgcolor" value="Green"> Green <br>
    <input type="radio" name="bgcolor" value="Blue"> Blue <br>
    <input type="radio" name="bgcolor" value="Red"> Red <br>
    <input type="submit">
</form>
<form method="get">
    Key: <input type="text" name="cKey">
    Value: <input type="text" name="cVal">
    <input type="submit">
</form>
    <p>
        <?php
            echo "Page Loads: " . $_SESSION['count'];
        ?>
    </p>
</body>
