<?php
session_start();

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "OnlineStore";

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    exit("Database connection failed: " . $e->getMessage());
}

// Get the submitted email and password
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare a SQL statement to retrieve the user with the provided username and password
$sql = "SELECT * FROM users WHERE username = :username AND password = :password";
$stmt = $pdo->prepare($sql);

// Bind the values to the named placeholders
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);

// Execute the statement
$stmt->execute();

// Fetch the first row from the result set
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if a user was found
if ($user) {
    // Set session variable
    $_SESSION['logged_in'] = true;

    // Redirect to index.php
    header('Location: index.php');
    exit();
} else {
    session_start();
    $_SESSION['error_message'] = "Incorrect Username or Password!";
    // echo "Username already exists!";
    // $error_message = "Username already exists!";
    header('Location: index.php?page=login');
    exit();
}
?>
