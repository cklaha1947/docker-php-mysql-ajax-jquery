<?php

$conn = mysqli_connect(
    "db2",        // Docker MySQL service name
    "chanchal",   // MySQL username
    "1234",       // MySQL password
    "ajaxcrud"    // Database name
);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>