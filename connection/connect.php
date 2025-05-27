<?php
// Database configuration
$db_host = 'localhost'; // Replace with your InfinityFree MySQL host
$db_user = 'root'; // Replace with your InfinityFree MySQL username
$db_pass = ''; // Replace with your InfinityFree MySQL password
$db_name = 'cooking'; // Replace with your InfinityFree MySQL database name

// Create database connection
$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}



?>