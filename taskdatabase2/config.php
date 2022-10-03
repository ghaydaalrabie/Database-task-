<?php

$servername = "localhost";
$username = "root1";
$password = "root";
$dbname = "employees";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
