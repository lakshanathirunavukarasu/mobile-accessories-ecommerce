<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    echo json_encode(["error" => "User not logged in."]);
    exit();
}

// Database connection settings
$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "your_database_name"; // <-- Change this to your actual database name

// Create connection
$conn = new mysqli($host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed."]);
    exit();
}

// Get the logged-in user ID
$user_id = $_SESSION["user_id"];

// Prepare and execute the query
$sql = "SELECT name, email, created_at FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    // Return user data as JSON
    echo json_encode([
        "name" => $row["name"],
        "email" => $row["email"],
        "created_at" => $row["created_at"]
    ]);
} else {
    echo json_encode(["error" => "User not found."]);
}

$stmt->close();
$conn->close();
?>
