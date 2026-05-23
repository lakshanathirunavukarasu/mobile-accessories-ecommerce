-- Database schema for SKM Mobiles website

CREATE DATABASE IF NOT EXISTS website;
USE website;

-- Table: products
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  stock INT NOT NULL,
  image VARCHAR(255) NOT NULL
);

-- Sample data for products
INSERT INTO products (name, price, stock, image) VALUES
('KDM bluetooth', 500.00, 4, 'images/p1.jpeg'),
('earphone', 399.00, 4, 'images/p2.jpeg'),
('Mobile stand', 250.00, 15, 'images/p3.jpeg'),
('AZ battery', 350.00, 10, 'images/p4.jpeg');


CREATE TABLE IF NOT EXISTS cart_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(255) NOT NULL,
quantity INT NOT NULL,
price DECIMAL(10,2) NOT NULL,
  user_id INT NULL,
  session_id VARCHAR(255) NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
