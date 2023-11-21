<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "perjalanan";
// Create connection
$conn = mysqli_connect($host, $username, $password, $database);
// Check connection
if (!$conn) {
    die(mysqli_connect_error($conn));
}
