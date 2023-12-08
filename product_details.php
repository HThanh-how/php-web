<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>

    <!-- Bootstrap CSS link -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for layout */
        .product-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .product-info {
            flex: 0 0 60%;
            padding: 0 20px;
        }

        .product-img {
            flex: 0 0 40%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Product Detail</h1>

        <div id="product-detail" class="product-container">
            <div class="product-img" id="product-img"></div>
            <div class="product-info" id="product-info"></div>
        </div>

        <!-- Bootstrap JS and Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
            // Function to fetch and display product detail
            async function fetchProductDetail() {
                try {
                    const productId = getProductIdFromUrl();
                    const response = await fetch(`getProductDetail.php?id=${productId}`);
                    const product = await response.json();

                    displayProductDetail(product);
                } catch (error) {
                    console.error('Error fetching product detail:', error);
                }
            }

            // Function to display product detail in the layout
            function displayProductDetail(product) {
                const productContainer = document.getElementById('product-detail');
                const productImgContainer = document.getElementById('product-img');
                const productInfoContainer = document.getElementById('product-info');

                productImgContainer.innerHTML = `<img src="${product.img}" alt="${product.productName}" class="img-fluid">`;

                productInfoContainer.innerHTML = `
                    <h5 class="card-title">${product.productName}</h5>
                    <p class="card-text">Price: $${product.price}</p>
                    <p class="card-text">Quantity: ${product.quantity}</p>
                    <p class="card-text">Rating: ${product.rate}</p>
                    <p class="card-text">Description: ${product.dct}</p>
                    
                `;
            }

            // Function to get product ID from the URL
            function getProductIdFromUrl() {
                const urlParams = new URLSearchParams(window.location.search);
                return urlParams.get('id');
            }

            // Fetch and display product detail when the page loads
            window.onload = fetchProductDetail;
        </script>
    </div>
</body>
</html>
