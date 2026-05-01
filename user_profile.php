<?php
session_start();
include '../config.php';

// Check if user is logged in
if(!isset($_SESSION['user_id'])) {
    header('Location: ../index.php?login=required');
    exit;
}

// Handle profile update
$message = '';
$error = '';

if(isset($_POST['update_profile'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validation
    if(empty($username) || empty($email)) {
        $error = 'Username and email are required.';
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email format.';
    } elseif(!empty($new_password)) {
        if($new_password !== $confirm_password) {
            $error = 'Passwords do not match.';
        } elseif(strlen($new_password) < 6) {
            $error = 'Password must be at least 6 characters.';
        } else {
            // Update with new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?");
            $stmt->execute([$username, $email, $hashed_password, $_SESSION['user_id']]);
            $message = 'Profile updated successfully!';
        }
    } else {
        // Update without changing password
        $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
        $stmt->execute([$username, $email, $_SESSION['user_id']]);
        $message = 'Profile updated successfully!';
    }
}

// Get current user data
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

if(!$user) {
    header('Location: ../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Profile - Nepal Tourism</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container { 
            max-width: 600px; 
            width: 100%;
            margin: 30px; 
        }
        
        .profile-card { 
            background: white; 
            padding: 40px; 
            border-radius: 25px; 
            box-shadow: 0 20px 60px rgba(0,0,0,0.2);
        }
        .profile-card h1 { 
            color: #2c3e50; 
            margin-bottom: 30px; 
            text-align: center;
        }
        
        .form-group { margin-bottom: 25px; }
        .form-group label { 
            display: block; 
            color: #666; 
            margin-bottom: 8px; 
            font-weight: 600;
        }
        .form-group input { 
            width: 100%; 
            padding: 15px 20px; 
            border: 2px solid #ddd; 
            border-radius: 12px; 
            font-size: 16px;
            transition: all 0.3s;
        }
        .form-group input:focus { 
            border-color: #667eea; 
            outline: none;
            box-shadow: 0 0 15px rgba(102,126,234,0.2);
        }
        
        .btn { 
            width: 100%; 
            padding: 18px; 
            background: #667eea; 
            color: white; 
            border: none; 
            border-radius: 12px; 
            font-size: 18px; 
            font-weight: bold; 
            cursor: pointer;
            transition: all 0.3s;
        }
        .btn:hover { 
            background: #5a6fd6; 
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102,126,234,0.4);
        }
        
        .message { 
            background: #d4edda; 
            color: #155724; 
            padding: 15px; 
            border-radius: 10px; 
            margin-bottom: 25px;
            text-align: center;
        }
        .error { 
            background: #f8d7da; 
            color: #721c24; 
            padding: 15px; 
            border-radius: 10px; 
            margin-bottom: 25px;
            text-align: center;
        }
        
        .links { 
            text-align: center; 
            margin-top: 25px;
        }
        .links a { 
            color: #667eea; 
            text-decoration: none;
            font-weight: 600;
        }
        .links a:hover { 
            text-decoration: underline;
        }
        
        .back-btn {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 12px 25px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
            transition: all 0.3s;
        }
        .back-btn:hover { transform: translateY(-2px); }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-card">
            <h1>👤 My Profile</h1>
            
            <?php if($message): ?>
                <div class="message"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>
            
            <?php if($error): ?>
                <div class="error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label>New Password (leave blank to keep current)</label>
                    <input type="password" name="new_password" placeholder="Enter new password">
                </div>
                
                <div class="form-group">
                    <label>Confirm New Password</label>
                    <input type="password" name="confirm_password" placeholder="Confirm new password">
                </div>
                
                <button type="submit" name="update_profile" class="btn">💾 Update Profile</button>
            </form>
            
            <div style="text-align: center;">
                <a href="user_dashboard.php" class="back-btn">← Back to Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
