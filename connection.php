<?php
$host = "localhost";
$user = "root";
$password = "";
$dbName = "united_tractors_db";

$conn = new mysqli($host, $user, $password, $dbName);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>