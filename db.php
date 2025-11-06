<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_commerce";  // ✅ Underscore (not hyphen)

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}

// Set charset to UTF-8
mysqli_set_charset($conn, "utf8mb4");  // ✅ utf8mb4 better hai

// Optional: Display success (for testing only - remove in production)
// echo "✅ Database connected successfully!";
?>