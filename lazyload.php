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
        if (strpos(strtolower($product['productName']), strtolower($searchQuery)) !== false) {
            $filteredData[] = $product;
        }
    }
} else {
    $filteredData = $data;
}

// Define a function to display the products
function displayProducts($products) {
    foreach ($products as $product) {
        echo '<div class="col-md-3 product">';
        echo '<div class="card">';
        echo '<img src="' . $product['img'] . '" class="card-img-top product-image" alt="Product image">';
        echo '<div class="card-body">';
        echo '<p class="card-text" style="text-align: right;"> $' . $product['price'] . '</p>';
        echo '<h5 class="card-title" style="height: 5vw;">' . $product['productName'] . '</h5>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
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


        <div class="row" id="product-container">


            <?php
            // Display the first 8 products
            displayProducts(array_slice($filteredData, 0, 8));
            ?>

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

            // Define the options for the Intersection Observer
            let options = {
                rootMargin: '0px',
                threshold: 0.9
            };

            // Define the target element to observe
            let target = document.createElement('div');
            target.id = 'js-load-more';
            document.getElementById('product-container').appendChild(target);

            // Define the observer callback function
            let observer = new IntersectionObserver(entries => {
                var entry = entries[0];
                if (entry.isIntersecting) {
                    // Load more products when the target element is visible
                    loadMoreProducts();
                }
            }, options);

            // Start observing the target element
            observer.observe(target);

            // Define a variable to keep track of the current index of the products array
            let currentIndex = 8;

            // Define a function to load more products
            function loadMoreProducts() {
                // Get the products array from PHP
                let products = <?php echo json_encode($filteredData); ?>;

                // Check if there are more products to load
                if (currentIndex < products.length) {
                    // Display the next 8 products
                    let nextProducts = products.slice(currentIndex, currentIndex + 8);
                    nextProducts.forEach(product => {
                        let productDiv = document.createElement('div');
                        productDiv.className = 'col-md-3 product';
                        productDiv.innerHTML = `
                            <div class="card">
                                <img src="${product.img}" class="card-img-top product-image" alt="Product image">
                                <div class="card-body">
                                    <p class="card-text" style="text-align: right;"> $${product.price}</p>
                                    <h5 class="card-title" style="height: 5vw;">${product.productName}</h5>
                                </div>
                            </div>
                        `;
                        document.getElementById('product-container').insertBefore(productDiv, target);
                    });

                    // Update the current index
                    currentIndex += 8;
                }
            }
        });
    </script>

</body>

</html>
