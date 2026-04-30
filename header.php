<nav class="enhanced-nav">
    <div class="nav-brand">
        <i class="fas fa-mountain"></i> Nepal Tourism
    </div>
    <div class="nav-links">
        <a href="#home">Home</a>
        <a href="#hotels">Hotels</a>
        <a href="#maps">Maps</a>
        <a href="#itinerary">Plan Trip</a>
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="user/dashboard.php">Dashboard</a>
            <a href="user/profile.php">Profile</a>
        <?php else: ?>
            <button onclick="showLogin()">Login</button>
        <?php endif; ?>
        <button id="themeToggle"><i class="fas fa-moon"></i></button>
    </div>
</nav>