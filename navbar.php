<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Home</a>
    <a class="nav-link" href="index.php?page=products">Products</a>
    <a class="nav-link" href="index.php?page=add-product">Add Products</a>
    <a class="nav-link" href="index.php?page=get-file">Get file (3.1)</a>
    <a class="nav-link" href="index.php?page=pagination">Pagination-4.1</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav m-1">
        <?php
            session_start();
            
            // Check if the user is logged in
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                // Display the logged-in user's name
                echo '<li class="nav-item"><a class="nav-link">' . $_SESSION['name'] . '</a></li>';
                // Add a logout link
                echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
            } else {
                // Display the Login and Register links
                echo '<li class="nav-item"><a class="nav-link" href="index.php?page=login">Login</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="index.php?page=register">Register</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>
