<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit/Delete Product</title>

    <!-- Bootstrap CSS link -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit/Delete Product</h1>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "OnlineStore";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the form is submitted for editing or deletion
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = $_POST["action"];
            $productId = $_POST["product_id"];

            if ($action == "edit") {
                // Handle product editing
                $productName = $_POST["product_name"];
                $price = $_POST["price"];
                $quantity = $_POST["quantity"];
                $rate = $_POST["rate"];
                $description = $_POST["description"];
                $img = $_POST["img"]; // Added img field

                $sql = "UPDATE products SET productName='$productName', price=$price, quantity=$quantity, rate=$rate, description='$description', img='$img' WHERE productID=$productId";

                if ($conn->query($sql) === TRUE) {
                    echo '<div class="alert alert-success" role="alert">Product updated successfully</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error updating product: ' . $conn->error . '</div>';
                }
            } elseif ($action == "delete") {
                // Handle product deletion
                $sql = "DELETE FROM products WHERE id=$productId";

                if ($conn->query($sql) === TRUE) {
                    echo '<div class="alert alert-success" role="alert">Product deleted successfully</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error deleting product: ' . $conn->error . '</div>';
                }
            }
        }

        // Fetch product details based on the provided product ID from the URL
        if (isset($_GET["id"])) {
            $productId = $_GET["id"];
            $sql = "SELECT * FROM products WHERE productID=$productId";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $product = $result->fetch_assoc();
            } else {
                echo '<div class="alert alert-danger" role="alert">Product not found</div>';
                exit;
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Product ID not provided</div>';
            exit;
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=$productId"); ?>">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="product_id" value="<?php echo $productId; ?>">

            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" name="product_name" value="<?php echo $product["productName"]; ?>" required>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" class="form-control" name="price" value="<?php echo $product["price"]; ?>" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" name="quantity" value="<?php echo $product["quantity"]; ?>" required>
            </div>

            <div class="form-group">
                <label for="rate">Rating:</label>
                <input type="number" step="0.1" class="form-control" name="rate" value="<?php echo $product["rate"]; ?>" required>
            </div>

            <div class="form-group">
                <label for="img">Image URL:</label>
                <input type="text" class="form-control" name="img" value="<?php echo $product["img"]; ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" rows="4" required><?php echo $product["description"]; ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Edit Product</button>
        </form>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=$productId"); ?>">
            <input type="hidden" n
