<?php
session_start();
include 'config.php'; // contains $conn

// Assuming user is logged in and email is stored in session
$user_email = $_SESSION['email'] ?? 'guest@example.com'; // fallback

// Read data from JS using POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderData = json_decode(file_get_contents("php://input"), true);

    if ($orderData && isset($orderData['name'], $orderData['price'], $orderData['quantity'])) {
        $name = $orderData['name'];
        $price = $orderData['price'];
        $quantity = $orderData['quantity'];
        $total = $price * $quantity;

        $stmt = $conn->prepare("INSERT INTO orders (user_email, product_name, price, quantity, total_amount) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdii", $user_email, $name, $price, $quantity, $total);

        if ($stmt->execute()) {
            echo "Order placed successfully!";
        } else {
            echo "Error placing order.";
        }

        $stmt->close();
    } else {
        echo "Invalid order data.";
    }
}
?>
