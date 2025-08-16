<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>