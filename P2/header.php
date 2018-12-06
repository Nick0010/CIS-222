<!DOCTYPE html>
<!--Display the nav-bar and all header tags-->
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Great Lakes Barcoding</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <div id="header">
        <a href="index.php"><img src="logo.png" /></a>
    </div>
	<?php
	session_start();
	// set up database connections
    require_once("../../../connect.php");
    $dsn = "mysql:host=" . HOST . ";dbname=" . DATABASE . ";charset=" . CHARSET;
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $pdo = new PDO($dsn, USER, PASS, $opt);
	?>

    <div class="navbar"> <a href="index.php?request=home"> Home </a> &nbsp;|&nbsp; <a href="index.php?request=catalog"> Products </a> &nbsp;|&nbsp; <a href="index.php?request=contact"> Contact Us </a> |
        <?php
            if(!isset($_SESSION['name']))
                echo '<a href="index.php?request=login">Log In</a></div>';
            else
                echo '<a href="index.php?request=logout">Sign out</a></div>';
        ?>
