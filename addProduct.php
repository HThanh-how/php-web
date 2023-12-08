<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</head>

<body>
    <div class="login-container">

        <h2>Add Product</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" id="productName" name="productName" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="1" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="price">Image Link</label>
                <input type="link" step="1" class="form-control" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="price">Quantity</label>
                <input type="number" step="1" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="form-group">
                <label for="price">Descrpiton</label>
                <input type="text" step="1" class="form-control" id="description" name="description">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="">Select a category</option>
                    <option value="men's clothing">Men's Clothing</option>
                    <option value="women's clothing">Women's Clothing</option>
                    <option value="jewelry">Jewelry</option>
                    <option value="electronics">Electronics</option>
                    <option value="electronics">Orders</option>
                </select>
            </div>


            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "OnlineStore";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $productName = $_POST['productName'];
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];
                    $img = $_POST['image'];
                    $dct = $_POST['description'];
                    $category = $_POST['category'];

                    $sql = "INSERT INTO products (productName, price, img, dct, quantity, category) VALUES ('$productName', '$price', '$img', '$dct', '$quantity','$category')";

                    if ($conn->query($sql) === TRUE) {

                        echo "<div class='alert alert-success'>Add Product successfully</div>";
                    } else {

                        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>
                        <script>
                            document.getElementById('price').value = '$price';
                            document.getElementById('quantity').value = '$quantity'; 
                            document.getElementById('image').value = '$img';
                            document.getElementById('description').value = '$dct'; 
                            document.getElementById('category').value = '$category'; 
                        </script>";
                    }
                }

                $conn->close();
            }
            ?>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>

    </div>

</body>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</html>