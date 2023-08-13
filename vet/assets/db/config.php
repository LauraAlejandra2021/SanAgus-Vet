<?php
session_start();

// Define database
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', '');
define('dbname', 'vetdog');

// Function to establish database connection using mysqli
function connectDB() {
    $mysqli = new mysqli(dbhost, dbuser, dbpass, dbname);
    if ($mysqli->connect_error) {
        die('Connection failed: ' . $mysqli->connect_error);
    }
    return $mysqli;
}
?>