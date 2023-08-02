<?php
// Database connection
$servername = "sql110.infinityfree.com";
$username = "if0_34387152";
$password = "TSklVo1qO1q";
$dbname = "if0_34387152_signupdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}