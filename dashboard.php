<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Nepal Tourism</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .container { max-width: 1400px; margin: 0 auto; padding: 30px; }
        
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
        .header h1 { color: #2c3e50; font-size: 2em; }
        .logout-btn { 
            background: #e74c3c; 
            color: white; 
            padding: 12px 30px; 
            border: none; 
            border-radius: 10px; 
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
        }
        .logout-btn:hover { background: #c0392b; transform: translateY(-2px); }
        
        .stats-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
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
        .stat-card h2 { font-size: 3em; color: #667eea; margin-bottom: 10px; }
        .stat-card p { color: #666; font-size: 1.2em; font-weight: 600; }
        
        .section {
            background: white;
            padding: 40px;
            border-radius: 20px;
            margin-bottom: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }
        .section h2 { color: #2c3e50; margin-bottom: 25px; font-size: 1.8em; }
        
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 18px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #667eea; color: white; font-weight: 600; }
        th:first-child { border-radius: 10px 0 0 0; }
        th:last-child { border-radius: 0 10px 0 0; }
        tr:hover { background: #f8f9ff; }
        
        .status-pending { color: #f39c12; font-weight: bold; }
        .status-confirmed { color: #27ae60; font-weight: bold; }
        .status-cancelled { color: #e74c3c; font-weight: bold; }
        
        .action-btn {
            padding: 8px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-right: 10px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .confirm-btn { background: #27ae60; color: white; }
        .cancel-btn { background: #e74c3c; color: white; }
        .action-btn:hover { transform: scale(1.05); }
        
        @media (max-width: 768px) {
            .header { flex-direction: column; gap: 20px; }
            .stats-grid { grid-template-columns: 1fr; }
            table { font-size: 14px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📊 Nepal Tourism Admin Dashboard</h1>
            <form method="POST">
                <button type="submit" name="logout" class="logout-btn">Logout</button>
            </form>
        </div>
        
        <!-- Statistics -->
        <div class="stats-grid">
            <?php
            // Get statistics
            $totalBookings = $pdo->query("SELECT COUNT(*) FROM bookings")->fetchColumn();
            $pendingBookings = $pdo->query("SELECT COUNT(*) FROM bookings WHERE status='pending'")->fetchColumn();
            $confirmedBookings = $pdo->query("SELECT COUNT(*) FROM bookings WHERE status='confirmed'")->fetchColumn();
            $totalRevenue = $pdo->query("SELECT SUM(amount) FROM bookings WHERE status='confirmed'")->fetchColumn() ?: 0;
            ?>
            <div class="stat-card">
                <h2><?php echo $totalBookings; ?></h2>
                <p>Total Bookings</p>
            </div>
            <div class="stat-card">
                <h2><?php echo $pendingBookings; ?></h2>
                <p>Pending</p>
            </div>
            <div class="stat-card">
                <h2><?php echo $confirmedBookings; ?></h2>
                <p>Confirmed</p>
            </div>
            <div class="stat-card">
                <h2>₹<?php echo number_format($totalRevenue); ?></h2>
                <p>Total Revenue</p>
            </div>
        </div>
        
        <!-- Recent Bookings -->
        <div class="section">
            <h2>📋 Recent Bookings</h2>
            <table>
                <tr>
                    <th>User</th>
                    <th>Hotel</th>
                    <th>Place</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                <?php
                $stmt = $pdo->query("SELECT * FROM bookings ORDER BY id DESC LIMIT 20");
                while($row = $stmt->fetch()) {
                    echo "<tr>
                        <td>".htmlspecialchars($row['user_name'])."</td>
                        <td>".htmlspecialchars($row['hotel'])."</td>
                        <td>".htmlspecialchars($row['place'])."</td>
                        <td>".htmlspecialchars($row['date'])."</td>
                        <td>₹".number_format($row['amount'])."</td>
                        <td class='status-".$row['status']."'>".ucfirst($row['status'])."</td>
                        <td>
                            <form method='POST' style='display:inline;'>
                                <input type='hidden' name='booking_id' value='{$row['id']}'>
                                <input type='hidden' name='action' value='confirm'>
                                <button type='submit' class='action-btn confirm-btn'>Confirm</button>
                            </form>
                            <form method='POST' style='display:inline;'>
                                <input type='hidden' name='booking_id' value='{$row['id']}'>
                                <input type='hidden' name='action' value='cancel'>
                                <button type='submit' class='action-btn cancel-btn'>Cancel</button>
                            </form>
                        </td>
                    </tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <?php
    // Handle booking actions
    if(isset($_POST['booking_id']) && isset($_POST['action'])) {
        $booking_id = (int)$_POST['booking_id'];
        $action = $_POST['action'];
        
        if($action === 'confirm') {
            $stmt = $pdo->prepare("UPDATE bookings SET status = 'confirmed' WHERE id = ?");
            $stmt->execute([$booking_id]);
        } elseif($action === 'cancel') {
            $stmt = $pdo->prepare("UPDATE bookings SET status = 'cancelled' WHERE id = ?");
            $stmt->execute([$booking_id]);
        }
        
        // Refresh page
        header("Location: dashboard.php");
        exit;
    }
    
    // Handle logout
    if(isset($_POST['logout'])) {
        session_destroy();
        header('Location: login.php');
        exit;
    }
    ?>
</body>
</html>
