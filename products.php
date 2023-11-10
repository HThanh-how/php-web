<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Add Product</title>
</head>

<body>
    <?php include 'addProduct.php'; ?>
    <?php include 'accountCreate.php'; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>








<?php
// Create a new database
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE if not exists OnlineStore";
if ($conn->query($sql) === TRUE) {
    // echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();

// Create tables: products and users

$conn = new mysqli($servername, $username, $password, "OnlineStore");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create products table
$sql = "CREATE TABLE products (
    productID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(30) NOT NULL,
    price DECIMAL(10,2) NOT NULL

    
)";

if ($conn->query($sql) === TRUE) {
    // echo "Table 'products' created successfully";
} else {
    // echo "Error creating table: " . $conn->error;
}

// Create users table
$sql = "CREATE TABLE users (
    userID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'users' created successfully";
} else {
    // echo "Error creating table: " . $conn->error;
}

// Insert new products
// $sql = "INSERT INTO products (productName, price, description) VALUES
//     ('Product 1', 10.99, 'Description 1'),
//     ('Product 2', 19.99, 'Description 2'),
//     ('Product 3', 5.99, 'Description 3')";

// if ($conn->query($sql) === TRUE) {
//     echo "New products inserted successfully";
// } else {
//     echo "Error inserting products: " . $conn->error;
// }

// Insert new user accounts with hashed passwords
// $passwordHash = password_hash('password123', PASSWORD_DEFAULT);
// $sql = "INSERT INTO users (username, password, email) VALUES
//     ('user1', '$passwordHash', 'user1@example.com'),
//     ('user2', '$passwordHash', 'user2@example.com'),
//     ('user3', '$passwordHash', 'user3@example.com')";

// if ($conn->query($sql) === TRUE) {
//     echo "New user accounts inserted successfully";
// } else {
//     echo "Error inserting user accounts: " . $conn->error;
// }

$conn->close();
?>



