CREATE DATABASE login_demo;

USE login_demo;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insert a sample user (password: 123456)
INSERT INTO users (username, password) VALUES ('admin', MD5('123456'));
   

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h2>Login Form</h2>
    <form action="login.php" method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>




<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "login_demo");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get values from form
$username = $_POST['username'];
$password = md5($_POST['password']); // encrypt password

// Query to check login
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    echo "Login successful! Welcome, " . $username;
    // You can start session here and redirect
    // session_start();
    // $_SESSION['username'] = $username;
    // header("Location: dashboard.php");
} else {
    echo "Invalid username or password.";
}

$conn->close();
?>
