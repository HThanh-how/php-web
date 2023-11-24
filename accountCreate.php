<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="login-container">
        <h1>Registration</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <?php

            // Check if form is submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Database connection settings
                $servername = "localhost";
                $username = "root";
                $password = "";

                $conn = new mysqli($servername, $username, $password, "OnlineStore");

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $username = isset($_POST['username']);
                $password = password_hash(isset($_POST['password']), PASSWORD_DEFAULT); // Hash the password

                $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

                if ($conn->query($sql) === TRUE) {

                    echo "<div class='alert alert-success'>Registration successful</div>";
                } else {

                    echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
                }

                $conn->close();
            }

            ?>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>