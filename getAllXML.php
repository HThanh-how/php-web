<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "OnlineStore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$products = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Set the Content-Type header to indicate XML content
header('Content-Type: text/xml');

// Output XML declaration
echo '<?xml version="1.0" encoding="UTF-8"?>';

// Output root element
echo '<products>';

// Output product elements
foreach ($products as $product) {
    echo '<product>';
    foreach ($product as $key => $value) {
        // Use htmlspecialchars to escape special characters in XML
        echo "<$key>" . htmlspecialchars($value) . "</$key>";
    }
    echo '</product>';
}

// Close root element
echo '</products>';

$conn->close();
?>
