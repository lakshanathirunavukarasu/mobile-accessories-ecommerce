<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'skm_mobiles');

if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to view the cart.";
    exit;
}

// Fetch cart items for the logged-in user with product details
$user_id = $_SESSION['user_id'];
$sql = "SELECT cart.quantity, products.name AS product_name, products.price, products.image 
        FROM cart 
        JOIN products ON cart.product_id = products.id 
        WHERE cart.user_id = $user_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Shopping Cart</h1>
    <div class="cart-items">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="cart-item">
                <h2><?php echo htmlspecialchars($row['product_name']); ?></h2>
                <p>Quantity: <?php echo $row['quantity']; ?></p>
                <p>Price: ₹<?php echo $row['price']; ?></p>
                <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['product_name']); ?>" style="max-width:100px;"/>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
