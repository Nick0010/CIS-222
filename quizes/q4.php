<?php
/**
 * User: Nick Bartel
 * Date: October 4th, 2018
 * Desc: Quiz 4
 */

/**
 * 1 pts
 * 1. You are working on a new project with a high profile partner, and it is your job to set up the database connection.
 *  Create a variable called $mysqlconnection and store a new connection object in it.
 *	This connection object can be either PDO or mysqli.
 *	Just use the credentials already included below.
 */
define( 'DBUSER', 'mzuck' );
define( 'DBPASS', 'TotallyNotARobot' );
define( 'DBHOST', 'robobook.com' );
define( 'DBNAME', 'robobook_prod' );
define( 'DBCHARSET', 'utf8' );

// Not entirely sure if these strictly have to be in seperate variable but its easier that way
$dsn= "mysql:host=" . DBHOST. ";dbname=" . DBNAME . ";charset=" . DBCHARSET;
// pretty sure this is optional but its there anyway
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$mysqlconnections = new PDO($dsn, DBUSER, DBPASS, $opt);

/**
 * 2 pts
 * 2. Use the previous connection object to select all columns from a table called memposts.
 *	Once you execute this, loop through the results and echo a column called `mptxt`.
 *	Assume there are a total of 7 columns and the `mempost_id` field is the primary key.
 *	Feel free to ask for the table structure at any time during this quiz if needed.
 */

$query="SELECT * FROM memposts";
$stmt = $pdo->query($query);
$results= $stmt->fetchAll();

foreach($results as $row){
    echo '<p> ' . $row['mptxt'] . '</p>';
}

/**
 * 2 pts
 * 3. Execute an update on the previous table.
 *	You want to set a field called `hidden` to 1 and `updated` to the current date and time.
 *	Only do this for all rows that have a `user_id` of 4 or 7.
 */
$query="UPDATE memposts SET hidden=1, updated=NOW() WHERE user_id=4 OR user_ID=7";
$stmt = $pdo->query($query);

/**
 * 3 pts
 * 4. Select the bottom 50 posts where the `hidden` field is 0.
 *	Loop through the results of this query and store the rows in an array called $RecentPosts.
 */

$query="SELECT * FROM memposts WHERE hidden=0 LIMIT 50 DESC";
$stmt = $pdo->query($query);
while ($row=$stmt->fetch()) {
    $RecentPosts = $row;
}

/**
 * 2 pts
 * 5. Manually insert a row into this table.
 *	You only need to specify the following fields: `mempost_id`, `user_id`, `mptxt`, `created`
 *	Assume all unspecified fields will default to their values.
 *	The user id is 1337.
 *	The created field should be the current date and time.
 *	The message should read 'I love PHP!' without the quotes.
 */

$query="INSERT INTO memposts ('mempost_id', 'user_id', 'mptxt', 'created') VALUES (NULL, 1337, 'I love PHP', NOW())";
$stmt = $pdo->query($query);

/**
 * 1 pt
 * E. Time to remove all test data and go live!
 *          Execute a query that will delete all rows from the database that has a `user_id` that is less than 20.
 */

$query="DELETE FROM memposts WHERE user_id< 20";
$stmt = $pdo->query($query);

