<?php
session_start();

// Connect to the database
$conn = new mysqli("localhost", "root", "", "website");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare statement to prevent SQL injection
$stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
  $row = $result->fetch_assoc();

  // Verify the password
  if (password_verify($password, $row['password'])) {
    // Start session and redirect
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['email'] = $email;

    header("Location: profile.php"); // or wherever you want
    exit();
  } else {
    echo "Invalid password.";
  }
} else {
  echo "No account found with that email.";
}

$stmt->close();
$conn->close();
?>
