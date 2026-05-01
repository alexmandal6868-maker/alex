<?php
session_start();
include '../config.php';

// Check if user is logged in
if(!isset($_SESSION['user_id'])) {
    header('Location: ../index.php?login=required');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Dashboard - Nepal Tourism</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .container { max-width: 1200px; margin: 0 auto; padding: 30px; }
        
        .header { 
            background: white; 
            padding: 25px 40px; 
            border-radius: 20px; 
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 10px 40px rgba(0,0,0,0.15);
        }
        .header h1 { color: #2c3e50; font-size: 1.8em; }
        .header p { color: #666; margin-top: 5px; }
        
        .nav-buttons { display: flex; gap: 15px; }
        .nav-btn { 
            background: #667eea; 
            color: white; 
            padding: 12px 25px; 
            border: none; 
            border-radius: 10px; 
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
        }
        .nav-btn:hover { transform: translateY(-2px); box-shadow: 0 10px 30px rgba(102,126,234,0.4); }
        .logout-btn { background: #e74c3c; }
        
        .stats-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); 
            gap: 25px; 
            margin-bottom: 40px; 
        }
        .stat-card { 
            background: white; 
            padding: 30px; 
            border-radius: 20px; 
            text-align: center;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }
        .stat-card:hover { transform: translateY(-10px); box-shadow: 0 20px 60px rgba(0,0,0,0.2); }
        .stat-card h2 { font-size: 2.5em; color: #667eea; margin-bottom: 10px; }
        .stat-card p { color: #666; font-size: 1.1em; font-weight: 600; }
        
        .section {
            background: white;
            padding: 40px;
            border-radius: 20px;
            margin-bottom: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }
        .section h2 { color: #2c3e50; margin-bottom: 25px; font-size: 1.6em; }
        
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #667eea; color: white; font-weight: 600; }
        tr:hover { background: #f8f9ff; }
        
        .empty-state { 
            text-align: center; 
            padding: 60px; 
            color: #999; 
        }
        .empty-state i { font-size: 4em; margin-bottom: 20px; }
        
        .btn {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 15px 30px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
            transition: all 0.3s;
        }
        .btn:hover { transform: translateY(-2px); box-shadow: 0 10px 30px rgba(102,126,234,0.4); }
        
        @media (max-width: 768px) {
            .header { flex-direction: column; gap: 20px; text-align: center; }
            .nav-buttons { flex-wrap: wrap; justify-content: center; }
            .stats-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <h1>👋 Welcome Back!</h1>
                <p>Manage your bookings and travel plans</p>
            </div>
            <div class="nav-buttons">
                <a href="../index.php" class="nav-btn">🏠 Home</a>
                <a href="profile.php" class="nav-btn">👤 Profile</a>
                <form method="POST" style="display:inline;">
                    <button type="submit" name="logout" class="nav-btn logout-btn">Logout</button>
                </form>
            </div>
        </div>
        
        <!-- Statistics -->
        <div class="stats-grid">
            <?php
            $user_id = $_SESSION['user_id'];
            
            // Get user statistics
            $totalBookings = $pdo->prepare("SELECT COUNT(*) FROM bookings WHERE user_id = ?");
            $totalBookings->execute([$user_id]);
            $totalBookings = $totalBookings->fetchColumn();
            
            $totalSpent = $pdo->prepare("SELECT SUM(amount) FROM bookings WHERE user_id = ? AND status = 'confirmed'");
            $totalSpent->execute([$user_id]);
            $totalSpent = $totalSpent->fetchColumn() ?: 0;
            
            $pendingBookings = $pdo->prepare("SELECT COUNT(*) FROM bookings WHERE user_id = ? AND status = 'pending'");
            $pendingBookings->execute([$user_id]);
            $pendingBookings = $pendingBookings->fetchColumn();
            
            $confirmedBookings = $pdo->prepare("SELECT COUNT(*) FROM bookings WHERE user_id = ? AND status = 'confirmed'");
            $confirmedBookings->execute([$user_id]);
            $confirmedBookings = $confirmedBookings->fetchColumn();
            ?>
            <div class="stat-card">
                <h2><?php echo $totalBookings; ?></h2>
                <p>Total Bookings</p>
            </div>
            <div class="stat-card">
                <h2>₹<?php echo number_format($totalSpent); ?></h2>
                <p>Total Spent</p>
            </div>
            <div class="stat-card">
                <h2><?php echo $pendingBookings; ?></h2>
                <p>Pending</p>
            </div>
            <div class="stat-card">
                <h2><?php echo $confirmedBookings; ?></h2>
                <p>Confirmed</p>
            </div>
        </div>
        
        <!-- My Bookings -->
        <div class="section">
            <h2>📋 My Bookings</h2>
            <?php
            $stmt = $pdo->prepare("SELECT * FROM bookings WHERE user_id = ? ORDER BY id DESC LIMIT 10");
            $stmt->execute([$user_id]);
            $bookings = $stmt->fetchAll();
            
            if(count($bookings) > 0) {
                echo '<table>
                    <tr>
                        <th>Hotel</th>
                        <th>Place</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>';
                foreach($bookings as $booking) {
                    $statusClass = $booking['status'] === 'confirmed' ? 'status-confirmed' : ($booking['status'] === 'pending' ? 'status-pending' : 'status-cancelled');
                    echo "<tr>
                        <td>".htmlspecialchars($booking['hotel'])."</td>
                        <td>".htmlspecialchars($booking['place'])."</td>
                        <td>".htmlspecialchars($booking['date'])."</td>
                        <td>₹".number_format($booking['amount'])."</td>
                        <td class='$statusClass'>".ucfirst($booking['status'])."</td>
                    </tr>";
                }
                echo '</table>';
            } else {
                echo '<div class="empty-state">
                    <i>📭</i>
                    <p>No bookings yet!</p>
                    <a href="../index.php" class="btn">Book Your First Trip</a>
                </div>';
            }
            ?>
        </div>
        
        <!-- Quick Actions -->
        <div class="section">
            <h2>⚡ Quick Actions</h2>
            <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                <a href="../tour.php" class="btn">🏨 Find Hotels</a>
<a href="../park.php" class="btn">🌳 National Parks</a>
                <a href="../aichatbook.php" class="btn">🏞️ Explore Lakes</a>
            </div>
        </div>
    </div>

    <?php
    // Handle logout
    if(isset($_POST['logout'])) {
        session_destroy();
        header('Location: ../index.php');
        exit;
    }
    ?>
</body>
</html>
