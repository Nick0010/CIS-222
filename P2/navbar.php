<?php
/**
 * Created by PhpStorm.
 * User: njbartel
 * Date: 12/6/2018
 * Time: 5:53 PM
 * displays the navbar
 */
echo '<div class="navbar"> <a href="index.php?request=home"> Home </a> &nbsp;|
&nbsp; <a href="index.php?request=catalog"> Products </a> &nbsp;|
&nbsp; <a href="index.php?request=contact"> Contact Us </a>  &nbsp|&nbsp';

                // change the output and link based on whether or not the user is logged in
                    if(!isset($_SESSION['name'])) {
                        echo '<a href="index.php?request=login"> Log In </a></div>';
                    }
                    else {
                        echo '<a href="index.php?request=cart"> View Cart </a>';
                        echo '&nbsp|&nbsp <a href="index.php?request=logout"> Sign out </a></div>';
					}
                echo '</div>';