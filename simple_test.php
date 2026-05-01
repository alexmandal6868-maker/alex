<?php
// Simple test to check database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Testing Database Connection</h1>";

try {
    echo "<p>Attempting MySQL connection...</p>";
    $pdo = new PDO("mysql:host=localhost;charset=utf8mb4", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p>✓ Connected to MySQL!</p>";
    
    // Create database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS nepal_tourism");
    $pdo->exec("USE nepal_tourism");
    echo "<p>✓ Database ready!</p>";
    
    // Check tables
    $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
    echo "<p>Tables: " . implode(", ", $tables) . "</p>";
    
} catch(PDOException $e) {
    echo "<p style='color:red'>✗ Error: " . $e->getMessage() . "</p>";
}
?>
