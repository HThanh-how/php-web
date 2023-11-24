<?php
// session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "OnlineStore";


try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    exit("Database connection failed: " . $e->getMessage());
}


$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];


if ($password !== $confirm_password) {
    echo '<script>alert("Passwords do not match!"); window.location.href = "register.php";</script>';
    exit();
}


$sql = "SELECT * FROM users WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->execute();

if ($stmt->rowCount() > 0) {


    // echo "Username already exists!";
    echo "<div class='alert alert-danger'>Error: Username already exists!</div>";
    // header('Location: register.php');
    exit();
}

$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
$stmt = $pdo->prepare($sql);


$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);


if ($stmt->execute()) {

    $_SESSION['logged_in'] = true;

    header('Location: index.php');
    exit();
} else {
    echo "Error creating user! Please try again.";
}
?>
