<?php

if (empty($_GET['page'])) {
    header("Location: index.php?page=home");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="styles.css">

    <!-- Sử dụng Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 100px;
            padding: 20px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            margin-bottom: 100px;
        }
    </style>
</head>

<body>
<?php include 'navbar.php'; ?>

<!-- <?php include 'home.php'; ?> -->
<?php if ($_GET['page'] === 'login') {
    include 'login.php';
  
} ?>
<?php if ($_GET['page'] === 'home') {
    include 'home.php';

} ?>
<?php if ($_GET['page'] === 'register') {
    include 'register.php';
} ?>
<?php if ($_GET['page'] === 'products') {
    include 'product_listing.php';
} ?>
<?php if ($_GET['page'] === 'add-product') {
    include 'addProduct.php';
} ?>

<?php if ($_GET['page'] === 'get-file') {
    include 'getfile.php';
} ?>
<?php if ($_GET['page'] === 'add') {
    include 'products.php';
} ?>
<?php if ($_GET['page'] === 'pagination') {
    include 'pagination.php';
} ?>

<?php include 'footer.php'; ?>
    <!-- Sử dụng Bootstrap JS (tùy chọn, chỉ cần nếu bạn sử dụng các thành phần JavaScript của Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
