<?php if(!isset($_SESSION)): session_start(); endif; ?>
<footer class="site-footer">
    <div class="footer-content">
        <div class="footer-section">
            <h3>🇳🇵 Nepal Tourism</h3>
            <p>Discover the beauty of Nepal - the roof of the world.</p>
            <div class="social-links">
                <a href="#">📘 Facebook</a>
                <a href="#">📷 Instagram</a>
                <a href="#">🐦 Twitter</a>
            </div>
        </div>
        <div class="footer-section">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="tour.php">Hotels</a></li>
                <li><a href="park.php">Parks</a></li>
                <li><a href="aichatbook.php">Lakes</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Contact</h4>
            <ul>
                <li>📍 Kathmandu, Nepal</li>
                <li>📞 +977 1-4123456</li>
                <li>✉️ info@nepaltourism.com</li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Newsletter</h4>
            <form class="newsletter-form" method="POST">
                <input type="email" placeholder="Your email" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> Nepal Tourism. All rights reserved.</p>
    </div>
</footer>
<style>
.site-footer {
    background: linear-gradient(135deg, #2c3e50 0%, #1a252f 100%);
    color: white;
    padding: 60px 5% 25px;
    margin-top: 80px;
}
.footer-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
    max-width: 1400px;
    margin: 0 auto;
}
.footer-section h3 {
    font-size: 1.8em;
    margin-bottom: 15px;
    color: #667eea;
}
.footer-section h4 {
    color: #667eea;
    margin-bottom: 15px;
}
.footer-section a {
    color: #aaa;
    text-decoration: none;
}
.footer-section a:hover {
    color: #667eea;
}
.social-links { display: flex; gap: 15px; }
.newsletter-form { display: flex; gap: 10px; }
.newsletter-form input { flex: 1; padding: 10px; border: none; border-radius: 5px; }
.newsletter-form button { padding: 10px 20px; background: #667eea; color: white; border: none; border-radius: 5px; cursor: pointer; }
</style>