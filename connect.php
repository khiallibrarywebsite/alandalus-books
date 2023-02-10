<?php
$servername = "localhost";
$username = "ziad";
$password = "tfUzC7/R!Fv(b]vM";
$dbname = "alandalus";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
