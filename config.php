<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'dietai');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: ");
}

?>