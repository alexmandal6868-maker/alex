<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
include '../config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial; margin: 0; padding: 20px; background: #f4f4f4; }
        .container { max-width: 1200px; margin: 0 auto; }
        .header { background: #2c3e50; color: white; padding: 20px; border-radius: 10px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #3498db; color: white; }
        .logout { background: #e74c3c; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; float: right; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nepal Tourism Admin Dashboard</h1>
            <form method="POST" style="float: right;">
                <button type="submit" name="logout" class="logout">Logout</button>
            </form>
        </div>

        <h2>Recent Bookings</h2>
        <table>
            <tr>
                <th>User</th>
                <th>Hotel</th>
                <th>Place</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
            <?php
            $stmt = $pdo->query("SELECT * FROM bookings ORDER BY id DESC LIMIT 50");
            while($row = $stmt->fetch()) {
                echo "<tr>
                    <td>{$row['user_name']}</td>
                    <td>{$row['hotel']}</td>
                    <td>{$row['place']}</td>
                    <td>{$row['date']}</td>
                    <td>₹{$row['amount']}</td>
                    <td>{$row['status']}</td>
                </tr>";
            }
            ?>
        </table>
    </div>

    <?php
    if(isset($_POST['logout'])) {
        session_destroy();
        header('Location: login.php');
    }
    ?>
</body>
</html>
<?php 
include '../config.php'; 
if(!isset($_SESSION['user_id'])) {
    header('Location: ../index.php?login=required');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="user-dashboard">
        <h1>Welcome Back! 👋</h1>
        
        <div class="stats-grid">
            <div class="stat-card">
                <h2 id="totalBookings">5</h2>
                <p>Total Bookings</p>
            </div>
            <div class="stat-card">
                <h2>₹25,000</h2>
                <p>Total Spent</p>
            </div>
            <div class="stat-card">
                <h2>4.6⭐</h2>
                <p>Average Rating</p>
            </div>
        </div>
        
        <div class="recent-bookings">
            <h3>Recent Bookings</h3>
            <!-- Dynamic bookings table -->
        </div>
        
        <a href="profile.php" class="profile-btn">Edit Profile</a>
        <a href="bookings.php" class="bookings-btn">View All Bookings</a>
    </div>
</body>
</html>