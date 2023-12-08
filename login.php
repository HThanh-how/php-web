<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="styles.css">

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

    <!-- <?php include 'navbar.php'; ?> -->


    <div class="login-container">
        <h2 class="text-center m-4">Login</h2>
        <form action="" method="POST" onsubmit="return validateForm()">
            <div class="form-group m-4">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Your username" required>
                <span id="username_error" style="color: red;"></span>
            </div>
            <div class="form-group m-4">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Passw@rd" required>
                <span id="password_error" style="color: red;"></span>
            </div>
            <button type="submit" class="btn btn-primary btn-block m-4">Sign in</button>
            <button onclick="window.location.href='index.php?page=register'" class="btn btn-secondary btn-block m-4">Register</button>
        </form>
    </div>

    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            var specialChars = /[!@#$%^&*()_+\-=\[\]{};':"\|,.<>\/?]+/;

            if (username.length < 6 || username.toUpperCase() === username || specialChars.test(username)) {
                document.getElementById("username_error").textContent = "Username must be at least 6 characters long, lowercase, and should not contain special characters.";
                return false;
            }

            if (password.length < 6) {
                document.getElementById("password_error").textContent = "Password must be at least 6 characters long.";
                return false;
            }
            // if (!validateInput(username, password)) {
            //     tmpUsername = username;
            //     tmpPassword = password;
            // }
            return true;
        }
    </script>
    <?php
    // session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "OnlineStore";
        $dbname = "OnlineStore";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        } catch (PDOException $e) {
            exit("Database connection failed: " . $e->getMessage());
        }

        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['logged_in'] = true;
            echo "<script>window.location.href='index.php';</script>";
            exit();
        } else {
            echo "<div class='alert alert-danger'>Incorrect username or password</div><script>
            document.getElementById('username').value = '$username';
            document.getElementById('password').value = '$password';
          </script>";
        }
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>