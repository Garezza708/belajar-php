<?php

// config connect to server
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create new object connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    exit("Connection failed: " . $conn->connect_error);
}
