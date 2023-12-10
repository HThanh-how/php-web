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
                $productName = addslashes($_POST["product_name"]);
                $price = $_POST["price"];
                $quantity = addslashes($_POST["quantity"]);
                $rate = $_POST["rate"];
                $description = addslashes($_POST["description"]);
                $img = addslashes($_POST["img"]);
                $category = addslashes($_POST["category"]);

                $sql = "UPDATE products SET productName='$productName', price=$price, quantity=$quantity, rate=$rate, dct='$description', img='$img' WHERE productID=$productId";

                if ($conn->query($sql) === TRUE) {
                    echo '<div class="alert alert-success" role="alert">Product updated successfully</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error updating product: ' . $conn->error . '</div>';
                }
            } elseif ($action == "delete") {
                // Handle product deletion
                $sql = "DELETE FROM products WHERE productID=$productId";

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

        <form method="post" action="">
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
                <label for="category">Category:</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="">Select a category</option>
                    <option value="men's clothing">Men's Clothing</option>
                    <option value="women's clothing">Women's Clothing</option>
                    <option value="jewelry">Jewelry</option>
                    <option value="electronics">Electronics</option>
                    <option value="electronics">Others</option>
                </select>
            </div>

            <div class="form-group">
                <label for="img">Image URL:</label>
                <input type="text" class="form-control" name="img" value="<?php echo $product["img"]; ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" rows="4" required><?php echo $product["dct"]; ?></textarea>
            </div>



            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>

        <!-- Form để xoá sản phẩm -->
        <form method="post" action="">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="product_id" value="<?php echo $productId; ?>">

            <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Are you sure you want to delete this product?')">Delete Product</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
