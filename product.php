<?php
session_start();
include 'config.php';

// Fetch products from the database
$sql = "SELECT name, price, stock, image FROM products";
$result = $conn->query($sql);
$products = [];

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Products</title>
  <style>
    body {
      background: url("images/red.gif") no-repeat center center fixed;
      background-size: cover;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      background: transparent;
      color: white;
      position: relative;
    }

    .logo-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .logo-container img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
    }

    .shop-name {
      color: white;
      font-size: 18px;
      font-weight: bold;
      margin-top: 5px;
    }

    .cart-icon {
      text-decoration: none;
      font-size: 24px;
      color: white;
      background: #d62b2b;
      padding: 10px 15px;
      border-radius: 50%;
      box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.4);
      transition: transform 0.2s ease;
    }

    .cart-icon:hover {
      transform: scale(1.1);
      background: #1b1a1a;
    }

    h1 {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      color: white;
      margin: 0;
      font-size: 24px;
    }

    .search-container {
      text-align: center;
      margin: 20px 0;
    }

    .search-container input {
      padding: 10px;
      width: 300px;
      border-radius: 20px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    .products {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      padding: 20px;
      max-width: 100%;
      box-sizing: border-box;
    }

    .product {
      width: calc(25% - 40px);
      padding: 15px;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      display: flex;
      flex-direction: column;
      align-items: center;
      box-sizing: border-box;
      background-color: rgba(0,0,0,0.4);
    }

    .product img {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
      object-fit: contain;
      background-color: white;
    }

    .product:hover img {
      transform: scale(1.03);
      transition: transform 0.3s ease;
    }

    .product-details {
      padding: 10px 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 5px;
    }

    .product h2 {
      font-size: 20px;
      margin: 0;
      color: white;
      text-transform: capitalize;
    }

    .price {
      font-size: 18px;
      font-weight: bold;
      color: #ff0000;
      margin-bottom: 4px;
    }

    .stock-quantity {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin: 4px 0;
    }

    .stock {
      color: white;
      margin: 2px 0;
    }

    .quantity {
      width: 60px;
      padding: 4px;
      margin-top: 4px;
      border-radius: 4px;
      border: 1px solid #ccc;
      text-align: center;
    }

    .buttons {
      margin-top: 10px;
      display: flex;
      justify-content: center;
      gap: 8px;
    }

    .buttons button {
      padding: 8px 14px;
      font-size: 14px;
      border-radius: 6px;
      color: white;
      background: linear-gradient(145deg, red 30%, black 70%);
      box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.5),
                  -2px -2px 6px rgba(255, 255, 255, 0.1);
      transition: all 0.2s ease-in-out;
      transform: translateY(-2px);
      border: none;
      cursor: pointer;
    }

    .buttons button:hover {
      background: linear-gradient(145deg, black 30%, red 70%);
      transform: translateY(-3px);
    }

    .buttons button:active {
      transform: translateY(1px);
      box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
    }

    .back-home-btn {
      display: inline-block;
      margin: 12px auto 0;
      padding: 8px 20px;
      font-size: 14px;
      font-weight: bold;
      color: white;
      background: linear-gradient(145deg, black 30%, red 70%);
      border: none;
      border-radius: 20px;
      text-decoration: none;
      box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4),
                  -1px -1px 3px rgba(255, 255, 255, 0.1);
      transition: all 0.3s ease;
    }

    .back-home-btn:hover {
      background: linear-gradient(145deg, red 30%, black 70%);
      transform: translateY(-2px);
    }

    .back-home-btn:active {
      transform: translateY(1px);
      box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);
    }
  </style>
</head>
<body>
  <header>
    <div class="logo-container">
      <img src="images/logo.png" alt="Shop Logo" />
      <div class="shop-name">SKM</div>
      <a href="index.php" class="back-home-btn">← Back to Home</a>
    </div>
    <h1>Products</h1>
    <a href="cart.php" class="cart-icon" title="Go to Cart">🛒cart</a>
  </header>

  <div class="search-container">
    <input type="text" id="search-input" placeholder="Search products..." />
  </div>

  <div class="products" id="products-container">
    <!-- Products will be dynamically generated here -->
  </div>

<script>
  // Pass PHP products array to JS
  const products = <?php echo json_encode($products); ?>;

  const productsContainer = document.getElementById("products-container");
  const searchInput = document.getElementById("search-input");

  function createProductElement(product) {
    const productDiv = document.createElement("div");
    productDiv.classList.add("product");

    productDiv.innerHTML = `
      <img src="${product.image}" alt="${product.name}" />
      <div class="product-details">
        <h2 class="product-name">${product.name}</h2>
        <p class="price">₹${product.price}</p>
        <div class="stock-quantity">
          <p class="stock">Stock: ${product.stock} available</p>
          <input type="number" class="quantity" value="1" min="1" max="${product.stock}" />
        </div>
        <div class="buttons">
          <form method="POST" action="add_to_cart.php" class="add-to-cart-form">
            <input type="hidden" name="product_name" value="${product.name}" />
            <input type="hidden" name="product_price" value="${product.price}" />
            <input type="hidden" name="product_image" value="${product.image}" />
            <input type="number" name="quantity" class="quantity" value="1" min="1" max="${product.stock}" />
            <button type="submit" class="add-to-cart">Add to Cart</button>
          </form>
          <button class="buy-now">Buy Now</button>
        </div>
      </div>
    `;

    // Add event listeners for buttons
    const addToCartForm = productDiv.querySelector(".add-to-cart-form");
    const buyNowBtn = productDiv.querySelector(".buy-now");

    addToCartForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const formData = new FormData(addToCartForm);
      fetch('add_to_cart.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.text())
      .then(data => {
        alert(data);
      })
      .catch(error => {
        alert('Error adding to cart');
      });
    });

    buyNowBtn.addEventListener("click", () => handleBuyNow(productDiv));

    return productDiv;
  }

  function handleAddToCart(productElement) {
    // This function is no longer used since add to cart is handled by form submission
  }

  function handleBuyNow(productElement) {
    const name = productElement.querySelector(".product-name")?.innerText;
    const priceText = productElement.querySelector(".price")?.innerText;
    const quantityInput = productElement.querySelector(".quantity");
    const quantity = quantityInput ? parseInt(quantityInput.value) : 1;
    const img = productElement.querySelector("img")?.src;

    if (!name || !priceText || !quantity || !img) {
      alert("Product information is incomplete.");
      return;
    }

    const price = parseFloat(priceText.replace("₹", ""));
    const product = {
      name: name,
      price: price,
      quantity: quantity,
      img: img
    };

    localStorage.setItem("buyNow", JSON.stringify([product]));
    localStorage.setItem("totalPrice", price * quantity);
    window.location.href = "payment.php";
  }

  // Render all products dynamically
  function renderProducts(productsToRender = products) {
    productsContainer.innerHTML = "";
    productsToRender.forEach(product => {
      const productElement = createProductElement(product);
      productsContainer.appendChild(productElement);
    });
  }

  // Filter products based on search input
  function filterProducts(query) {
    const filteredProducts = products.filter(product =>
      product.name.toLowerCase().includes(query.toLowerCase())
    );
    renderProducts(filteredProducts);
  }

  document.addEventListener("DOMContentLoaded", () => {
    renderProducts();

    searchInput.addEventListener("input", () => {
      const query = searchInput.value.trim();
      filterProducts(query);
    });
  });
</script>
</body>
</html>
