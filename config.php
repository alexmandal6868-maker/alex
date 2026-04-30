<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nepal_tourism";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Create tables if not exists
$sql = "
CREATE TABLE IF NOT EXISTS hotels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    place VARCHAR(100),
    price DECIMAL(10,2),
    link VARCHAR(500),
    image VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100),
    place VARCHAR(100),
    hotel VARCHAR(100),
    date DATE,
    amount DECIMAL(10,2),
    status ENUM('pending','confirmed') DEFAULT 'pending'
);
";
$pdo->exec($sql);

// Sample data
$check = $pdo->query("SELECT COUNT(*) FROM hotels")->fetchColumn();
if($check == 0) {
    $sampleHotels = [
        ['Everest View Hotel', 'Upper Hill', 50000, 'https://booking.com/everest', 'everest.jpg'],
        ['Annapurna Hotel', 'Lower Hill', 25000, 'https://booking.com/annapurna', 'annapurna.jpg'],
        ['Pokhara Lakeside', 'Normal Cold', 15000, 'https://booking.com/pokhara', 'pokhara.jpg'],
        ['Chitwan Jungle Lodge', 'Terai', 8000, 'https://booking.com/chitwan', 'chitwan.jpg']
    ];
    
    $stmt = $pdo->prepare("INSERT INTO hotels (name, place, price, link, image) VALUES (?, ?, ?, ?, ?)");
    foreach($sampleHotels as $hotel) {
        $stmt->execute($hotel);
    }
}
?>