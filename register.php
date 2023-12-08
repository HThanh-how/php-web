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
    <!-- <?php include 'navbar.php'; ?> -->


    <div class="login-container">
        <h2 class="text-center m-4">Register</h2>
        <form action="" method="POST" onsubmit="return validateForm()">
            <div class="form-group m-4">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Your username" required>
                <span id="username_error" style="color: red;"></span>
            </div>
            <div class="form-group m-4">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Passw@rd" required>
            </div>
            <div class="form-group m-4">
                <label for="confirm_password">Re-write Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Passw@rd" required>
                <span id="password_error" style="color: red;"></span>
            </div>
            <button type="submit" class="btn btn-primary btn-block m-4 ">Register</button>
            <button onclick="window.location.href='index.php?page=login'" class="btn btn-secondary btn-block m-4">Sign in</button>
        </form>
    </div>
    
    <script>
    function validateForm() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var confirm_password = document.getElementById("confirm_password").value;
    
        var specialChars = /[!@#$%^&*()_+\-=\[\]{};':"\|,.<>\/?]+/;
    
        if (username.length < 6 || username.toUpperCase() === username || specialChars.test(username)) {
            document.getElementById("username_error").textContent = "Username must be at least 6 characters long, lowercase, and should not contain special characters.";
            return false;
        } else {
            document.getElementById("username_error").textContent = "";
        }
    
        if (password.length < 6) {
            document.getElementById("password_error").textContent = "Password must be at least 6 characters long.";
            return false;
        }
    
        if (password != confirm_password) {
            document.getElementById("password_error").textContent = "Passwords do not match.";
            return false;
        }
    
        return true;
    }
    </script>
     <?php


// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

 
//     $servername = "localhost";
//     $username = "root";
//     $password = "";

//     $conn = new mysqli($servername, $username, $password, "OnlineStore");

//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     $confirm_password = $_POST['confirm_password'];

//     $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

//     if ($conn->query($sql) === TRUE) {

//         echo "<div class='alert alert-success'>Registration successful. Please Login again</div>";
//     } else {

//         echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div><script>
//         document.getElementById('username').value = '$username';
//         document.getElementById('password').value = '$password'; document.getElementById('confirm_password').value = '$confirm_password';</script>";
//     }

//     $conn->close();
// }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Database connection settings
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password, "OnlineStore");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if username exists


    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    $checkUsernameQuery = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($checkUsernameQuery);

    if ($result->num_rows > 0) {
        echo "<div class='alert alert-danger'>Error: Username already exists.</div><script>
        document.getElementById('username').value = '$username';
        document.getElementById('password').value = '$password';
        document.getElementById('confirm_password').value = '$confirm_password';</script>";
        $conn->close();
        exit; // Stop the execution of further code
    }

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Registration successful. Please login again.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div><script>
        document.getElementById('username').value = '$username';
        document.getElementById('password').value = '$password';
        document.getElementById('confirm_password').value = '$confirm_password';</script>";
    }

    $conn->close();
}




?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>