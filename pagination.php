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

// Get the number of items per page from the user input or use a default value
$itemsPerPage = isset($_GET['itemsPerPage']) ? $_GET['itemsPerPage'] : 4;

// Calculate the total number of pages
$totalPages = ceil(count($filteredData) / $itemsPerPage);

// Get the current page number from the URL or use a default value
$currentPage = isset($_GET['inpage']) ? $_GET['inpage'] : 1;

// Validate the current page number
if ($currentPage < 1 || $currentPage > $totalPages) {
    $currentPage = 1;
}

// Fetch the items for the current page
$offset = ($currentPage - 1) * $itemsPerPage;
$items = array_slice($filteredData, $offset, $itemsPerPage);

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

        .pagination {
            margin-top: 30px;
        }

        .pagination li {
            display: inline-block;
            margin: 5px;
        }

        .pagination li a {
            text-decoration: none;
            color: black;
            padding: 10px;
            border: 1px solid gray;
            border-radius: 5px;
        }

        .pagination li.active a {
            background-color: gray;
            color: white;
        }
    </style>
</head>

<body>
        <title>Pagination</title>
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

        <!-- Add the select element here -->
        <div> Items per page<select id="item-per-page-select">
            <option value="4">4</option>
            <option value="8">8</option>
            <option value="12">12</option>
        </select></div>
        

        <script>
            // Lấy giá trị itemPerPage từ query string
            var urlParams = new URLSearchParams(window.location.search);
            var defaultItemPerPage = urlParams.get('itemsPerPage');

            // Thiết lập giá trị mặc định cho select box
            document.getElementById('item-per-page-select').value = defaultItemPerPage;

            // Xử lý sự kiện khi người dùng chọn giá trị khác
            document.getElementById('item-per-page-select').addEventListener('change', function() {
                var selectedValue = this.value;

                // Cập nhật giá trị itemPerPage trong URL
                urlParams.set('itemsPerPage', selectedValue);

                // Thiết lập lại URL trang với giá trị mới
                window.location.href = window.location.pathname + '?' + urlParams.toString();
            });
        </script>


        <div class="row">

            <?php foreach ($items as $product) : ?>
                <div class="col-md-3 product" >
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

        <ul class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="<?php echo $i == $currentPage ? 'active' : ''; ?>">
                    <a href="?page=pagination&inpage=<?php echo $i; ?>&itemsPerPage=<?php echo $itemsPerPage; ?>&search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
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