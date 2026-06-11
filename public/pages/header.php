<?php session_start(); ?>
<nav class="enhanced-nav">
    <div class="nav-brand">
        <i class="fas fa-mountain"></i> Nepal Tourism
    </div>
    <div class="nav-links">
        <a href="../index.php">Home</a>
        <a href="tour.php">Hotels</a>
        <a href="park.php">Parks</a>
        <a href="aichatbook.php">Lakes</a>
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="../user/dashboard.php">Dashboard</a>
            <a href="../user/profile.php">Profile</a>
        <?php else: ?>
            <button onclick="alert('Login Feature')">Login</button>
        <?php endif; ?>
        <button id="themeToggle">🌙</button>
    </div>
</nav>
<style>
.enhanced-nav {
    background: linear-gradient(90deg, #667eea, #764ba2);
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}
.nav-brand {
    font-weight: bold;
    font-size: 1.3em;
}
.nav-links {
    display: flex;
    gap: 20px;
    align-items: center;
}
.nav-links a, .nav-links button {
    color: white;
    text-decoration: none;
    padding: 8px 15px;
    border-radius: 5px;
    transition: all 0.3s;
    border: none;
    cursor: pointer;
    background: rgba(255,255,255,0.2);
}
.nav-links a:hover, .nav-links button:hover {
    background: white;
    color: #667eea;
}
</style>