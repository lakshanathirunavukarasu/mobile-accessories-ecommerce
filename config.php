<?php
$servername = "localhost";  // Change this to your server address (default for XAMPP is localhost)
$username = "root";         // Default username for MySQL in XAMPP is root
$password = "";             // Default password for MySQL in XAMPP is empty
$dbname = "website"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
