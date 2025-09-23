<?php
$host = "localhost"; // or 127.0.0.1
$dbname = "your_database_name";
$username = "your_mysql_username";
$password = "your_mysql_password";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form inputs
$user = $_POST['username'];
$pass = $_POST['password'];

// Protect against SQL injection
$user = mysqli_real_escape_string($conn, $user);
$pass = mysqli_real_escape_string($conn, $pass);

// Query the database
$sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Valid login
    header("Location: weather.html");
    exit();
} else {
    echo "Invalid username or password.";
}

$conn->close();
?>

