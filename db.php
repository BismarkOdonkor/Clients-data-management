<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mycrudproject";

// Create connection
$connection = new mysqli($servername, $username, $password);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Create database if it doesn't exist
$sqldb = "CREATE DATABASE IF NOT EXISTS $database";
if ($connection->query($sqldb) === TRUE) {
    // Switch to the newly created or existing database
    $connection->select_db($database);

    // Create table if it doesn't exist
    $table_sql = 'CREATE TABLE IF NOT EXISTS clients (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(20) NOT NULL,
        address VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )';

    if ($connection->query($table_sql) === FALSE) {
        echo "Error creating table: " . $connection->error;
    }
} else {
    echo "Error creating database: " . $connection->error;
}

?>
