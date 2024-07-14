<?php
// Include db.php for database connection
require_once 'db.php';

// Check if 'id' parameter is passed in the URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Escape any special characters in the ID to avoid SQL injection
    $id = $connection->real_escape_string($id);

    $sql = "DELETE FROM clients WHERE id='$id'";

    if ($connection->query($sql) === TRUE) {
        // Redirect to index page after successful deletion
        header("Location: index.php");
        exit;
    } else {
        echo "Error deleting record: " . $connection->error;
    }
} else {
    // If 'id' is not set in the URL, redirect to index.php or handle as per your application logic
    header("Location: index.php");
    exit;
}

// Close database connection
$connection->close();
?>
