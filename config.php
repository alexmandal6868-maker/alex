<?php
// Display errors for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nepal_tourism";
$pdo = null;
$db_error = "";

try {
    // First connect without database to create it if needed
    $pdo = new PDO("mysql:host=$servername;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Create database if not exists
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname`");
    $pdo->exec("USE `$dbname`");
    
} catch(PDOException $e) {
    $db_error = $e->getMessage();
    // Fallback: try connecting without database name
    try {
        $pdo = new PDO("mysql:host=$servername;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname`");
        $pdo->exec("USE `$dbname`");
    } catch(PDOException $e2) {
        // Demo mode when MySQL not available
        $pdo = null;
        $db_error = $e2->getMessage();
    }
}

// Only continue database setup if connection successful
if($pdo !== null) {

// Create tables if not exists with proper structure
$sql = "
CREATE TABLE IF NOT EXISTS hotels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    place VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    link VARCHAR(500),
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100) NOT NULL,
    place VARCHAR(100) NOT NULL,
    hotel VARCHAR(100) NOT NULL,
    date DATE NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    status ENUM('pending','confirmed','cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    role ENUM('user','admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
";
$pdo->exec($sql);

// Sample data
$check = $pdo->query("SELECT COUNT(*) FROM hotels")->fetchColumn();
if($check == 0) {
    $sampleHotels = [
        ['Everest View Hotel', 'Upper Hill', 50000.00, 'https://booking.com/everest', 'everest.jpg'],
        ['Annapurna Hotel', 'Lower Hill', 25000.00, 'https://booking.com/annapurna', 'annapurna.jpg'],
        ['Pokhara Lakeside', 'Normal Cold', 15000.00, 'https://booking.com/pokhara', 'pokhara.jpg'],
        ['Chitwan Jungle Lodge', 'Terai', 8000.00, 'https://booking.com/chitwan', 'chitwan.jpg']
    ];
    
    $stmt = $pdo->prepare("INSERT INTO hotels (name, place, price, link, image) VALUES (?, ?, ?, ?, ?)");
    foreach($sampleHotels as $hotel) {
        $stmt->execute($hotel);
    }
}

// Secure function to sanitize input
function sanitizeInput($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Function to check if user is admin
function isAdmin() {
    return isset($_SESSION['admin']) && $_SESSION['admin'] === true;
}

// Function to check session timeout (30 minutes)
function checkSessionTimeout() {
    if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time']) > 1800) {
        session_destroy();
        return false;
    }
    return true;
}

// Close database connection check
}

// Demo mode fallback functions
if($pdo === null) {
    function sanitizeInput($data) {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }
    function isAdmin() {
        return isset($_SESSION['admin']) && $_SESSION['admin'] === true;
    }
    function checkSessionTimeout() {
        return true;
    }
}
?>
