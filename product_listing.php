<?php

// Fetch data from the API
$response = file_get_contents('http://localhost/lab2/getAll.php');

// Convert the JSON response to an associative array
$data = json_decode($response, true);

// Filter the products based on search query
$filteredData = [];

if (!empty($_GET['search'])) {
    $searchQuery = $_GET['search'];
    foreach ($data as $product) {
        if (strpos(strtolower($product['title']), strtolower($searchQuery)) !== false) {
            $filteredData[] = $product;
        }
    }
} else {
    $filteredData = $data;
}

?>

<!DOCTYPE html>
<html>

<head>
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

        .no-product-found {
            display: none;
        }
    </style>
</head>

<body>
    <title>Products Collection</title>
    <div class="container">
        <h1>Product List</h1>

        <style>
            #search-bar {
                padding: 10px;
                margin: 40px;
                /* border: 1px solid gray; */
                border-radius: 10px;
                font-size: 16px;
                width: 50vw;
            }
        </style>

        <input type="text" id="search-bar" placeholder="Tìm kiếm sản phẩm">


        <div class="row">


            <?php foreach ($filteredData as $product) : ?>
                <div class="col-md-3 product">
                <div class="card">
                        <a href="/lab2/index.php?page=product-details&id=<?php echo $product['productID']; ?>">
                            <img src="<?php echo $product['img']; ?>" class="card-img-top product-image" alt="Product image">
                        </a>
                        <div class="card-body">
                            <p class="card-text" style="text-align: right;">$<?php echo $product['price']; ?></p>
                            <h5 class="card-title" style="height: 5vw;"><?php echo $product['productName']; ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="col-md-12 no-product-found">
                <h3>No Product Found</h3>
            </div>


        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Get the search bar element
            var searchBar = document.getElementById('search-bar');

            // Add event listener to the search bar
            searchBar.addEventListener('input', function() {
                // Get the search query
                var searchQuery = searchBar.value.toLowerCase();

                // Hide/show the products based on the search query
                $('.product').each(function() {
                    var productTitle = $(this).find('.card-title').text().toLowerCase();
                    if (productTitle.includes(searchQuery)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                // Show "No Product Found" message if no products match the search query
                if ($('.product:visible').length === 0) {
                    $('.no-product-found').show();
                } else {
                    $('.no-product-found').hide();
                }
            });
        });
    </script>

</body>

</html>