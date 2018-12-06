        <div>
            <div class="navbar"> <a href="index.php?request=home"> Home </a> &nbsp;|&nbsp; <a href="index.php?request=catalog"> Products </a> &nbsp;|&nbsp; <a href="index.php?request=contact"> Contact Us </a> |         <?php
                if(!isset($_SESSION['name']))
                    echo '<a href="index.php?request=login">Log In</a></div>';
                else
                    echo '<a href="index.php?request=logout">Sign out</a></div>';
                ?></div>
        <div> © Copyright 2018 Great Lakes Barcoding</div>
        </div>
    </body
</html>