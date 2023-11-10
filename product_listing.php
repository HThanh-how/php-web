<?php

// Fetch data from the API
$response = file_get_contents('https://fakestoreapi.com/products');

// Convert the JSON response to an associative array
$data = json_decode($response, true);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Product List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .product {
            margin-bottom: 30px;
        }

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

        <div class="row">

            <?php foreach ($data as $product) : ?>
                <div class="col-md-3 product">
                    <div class="card">
                        <img src="<?php echo $product['image']; ?>" class="card-img-top product-image" alt="Product image">
                        <div class="card-body">
                            <p class="card-text" style="text-align: right;"> $<?php echo $product['price']; ?></p>

                            <h5 class="card-title" style="height: 5vw;"><?php echo $product['title']; ?></h5>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>

</html>