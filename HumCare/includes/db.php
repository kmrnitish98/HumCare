<?php
// Central database connection used by the app
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'humcare';

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if (!$conn) {
    error_log("Database connection failed: " . mysqli_connect_error());
    die("Database connection failed");
}
mysqli_set_charset($conn, 'utf8mb4');
