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
    </style>
</head>
<body>
    <div class="login-form">
        <h2 style="text-align: center; margin-bottom: 30px;">Admin Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
    </div>

    <?php
    if(isset($_POST['login'])) {
        if($_POST['username'] == 'admin' && $_POST['password'] == 'nepal123') {
            $_SESSION['admin'] = true;
            echo "<script>window.opener.location.href='admin/dashboard.php'; window.close();</script>";
        } else {
            echo "<script>alert('Invalid credentials!');</script>";
        }
    }
    ?>
</body>
</html>