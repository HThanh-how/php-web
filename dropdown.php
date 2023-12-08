<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .product-image {
            width: 15vw;
            height: 20vw;
            object-fit: scale-down;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Product List</h1>

        <select id="product-dropdown" class="form-control">
            <option value="">Select a product</option>

            <?php

            // Fetch data from the API
            $response = file_get_contents('http://localhost/lab2/getAll.php');

            // Convert the JSON response to an associative array
            $data = json_decode($response, true);

            foreach ($data as $product) : ?>
                <option value="<?php echo $product['id']; ?>">
                    <?php echo $product['productName']; ?> - $<?php echo $product['price']; ?>
                </option>
            <?php endforeach; ?>

        </select>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img id="selected-product-image" src="<?php echo $product['img']; ?>" class="card-img-top product-image" alt="Selected product image">
                        <h5 id="selected-product-title"></h5>
                        <p id="selected-product-price" style="text-align: right;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Get the product dropdown element
            var productDropdown = document.getElementById('product-dropdown');
            var selectedProductTitle = document.getElementById('selected-product-title');
            var selectedProductPrice = document.getElementById('selected-product-price');
            var selectedProductImage = document.getElementById('selected-product-image');

            // Add event listener to the product dropdown
            productDropdown.addEventListener('change', function() {
                var selectedProductId = productDropdown.value;

                if (selectedProductId !== "") {
                    // Find the selected product based on the ID
                    var selectedProduct;
                    <?php foreach ($data as $product) : ?>
                        if ("<?php echo $product['id']; ?>" === selectedProductId) {
                            selectedProduct = <?php echo json_encode($product); ?>;
                            exit
                        }
                    <?php endforeach; ?>

                    // Set the selected product's details in the card
                    selectedProductTitle.textContent = selectedProduct.title;
                    selectedProductPrice.textContent = "$" + selectedProduct.price;
                    selectedProductImage.src = selectedProduct.image;
                } else {
                    // Clear the card if no product is selected
                    selectedProductTitle.textContent = "";
                    selectedProductPrice.textContent = "";
                    selectedProductImage.src = "";
                }
            });
        });
    </script>

</body>

</html>
