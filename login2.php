<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="login-container">
        <h1>Login</h1>
        <form action="" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>


            <button type="submit" class="btn btn-primary">Login</button>

        </form>
        <?php
        session_start();
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



            $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);

            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                $_SESSION['logged_in'] = true;
                header('Location: index.php');
                exit();
            } else {
                echo "<div class='alert alert-danger'>Incorrect username or password</div>";
            }
        }

        ?>
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

            return true;
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>