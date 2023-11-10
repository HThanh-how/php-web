


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
        }
    </style>
</head>

<body>
    
    <!-- <?php include 'navbar.php'; ?> -->


    <div class="login-container">
        <h2 class="text-center m-4">Login</h2>
        <form action="loginProcessing.php" method="POST" onsubmit="return validateForm()">
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
    
        return true;
    }
    </script>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>