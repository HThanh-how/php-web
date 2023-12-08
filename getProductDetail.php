
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "OnlineStore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$productID = $_GET['id'];

$sql = "SELECT * FROM products WHERE productID = $productID";
$result = $conn->query($sql);

$product = [];

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
}

echo json_encode($product);

$conn->close();
?>
