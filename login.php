<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body { font-family: Arial; background: linear-gradient(45deg, #667eea 0%, #764ba2 100%); height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-form { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.2); width: 100%; max-width: 400px; }
        input { width: 100%; padding: 15px; margin: 10px 0; border: 2px solid #ddd; border-radius: 10px; font-size: 16px; }
        button { width: 100%; padding: 15px; background: #27ae60; color: white; border: none; border-radius: 10px; font-size: 18px; cursor: pointer; }
        button:hover { background: #219a52; }
        .error { color: red; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="login-form">
        <h2 style="text-align: center; margin-bottom: 30px;">Admin Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required autocomplete="username">
            <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
            <input type="hidden" name="csrf_token" value="<?php echo isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : ''; ?>">
            <button type="submit" name="login">Login</button>
        </form>
    </div>

    <?php
    // Generate CSRF token if not exists
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    
    if(isset($_POST['login'])) {
        // Verify CSRF token
        if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
            echo "<script>alert('Security error!');</script>";
            exit;
        }
        
        // Sanitize inputs
        $username = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');
        $password = $_POST['password'];
        
        // In production, use hashed password from database
        // This is a secure hash of 'nepal123'
        $storedHash = password_hash('nepal123', PASSWORD_DEFAULT);
        
        // Verify credentials securely (use database in production)
        if($username === 'admin' && password_verify($password, $storedHash)) {
            $_SESSION['admin'] = true;
            $_SESSION['login_time'] = time();
            echo "<script>window.opener.location.href='dashboard.php'; window.close();</script>";
        } elseif($username === 'admin' && $password === 'nepal123') {
            // Legacy fallback (remove after updating password hash)
            $_SESSION['admin'] = true;
            $_SESSION['login_time'] = time();
            echo "<script>window.opener.location.href='dashboard.php'; window.close();</script>";
        } else {
            echo "<script>alert('Invalid credentials!');</script>";
        }
    }
    ?>
</body>
</html>