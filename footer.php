<footer class="site-footer">
    <div class="footer-content">
        <div class="footer-section">
            <h3>🇳🇵 Nepal Tourism</h3>
            <p>Discover the beauty of Nepal - the roof of the world.</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        
        <div class="footer-section">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="tour.php">Hotels</a></li>
<li><a href="park.php">Parks</a></li>
                <li><a href="aichatbook.php">Lakes</a></li>
            </ul>
        </div>
        
        <div class="footer-section">
            <h4>Contact</h4>
            <ul>
                <li>📍 Kathmandu, Nepal</li>
                <li>📞 +977 1-4XXXXXX</li>
                <li>✉️ info@nepaltourism.com</li>
            </ul>
        </div>
        
        <div class="footer-section">
            <h4>Newsletter</h4>
            <p>Subscribe for travel updates and deals.</p>
            <form class="newsletter-form" method="POST">
                <input type="email" placeholder="Your email" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> Nepal Tourism. All rights reserved. | 
        <a href="privacy.php">Privacy Policy</a> | 
        <a href="terms.php">Terms of Service</a></p>
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
    background: linear-gradient(45deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.footer-section h4 {
    font-size: 1.3em;
    margin-bottom: 20px;
    color: #667eea;
}

.footer-section p {
    color: #aaa;
    line-height: 1.8;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 12px;
    color: #aaa;
}

.footer-section a {
    color: #aaa;
    text-decoration: none;
    transition: all 0.3s;
}

.footer-section a:hover {
    color: #667eea;
    padding-left: 8px;
}

.social-links {
    display: flex;
    gap: 15px;
    margin-top: 20px;
}

.social-links a {
    width: 45px;
    height: 45px;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3em;
    transition: all 0.3s;
}

.social-links a:hover {
    background: #667eea;
    transform: translateY(-5px);
}

.newsletter-form {
    display: flex;
    gap: 10px;
    margin-top: 15px;
}

.newsletter-form input {
    flex: 1;
    padding: 12px 18px;
    border: none;
    border-radius: 8px;
    background: rgba(255,255,255,0.1);
    color: white;
}

.newsletter-form button {
    padding: 12px 20px;
    background: #667eea;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    transition: all 0.3s;
}

.newsletter-form button:hover {
    background: #5a6fd6;
}

.footer-bottom {
    text-align: center;
    padding-top: 30px;
    margin-top: 40px;
    border-top: 1px solid rgba(255,255,255,0.1);
    color: #666;
}

.footer-bottom a {
    color: #aaa;
    text-decoration: none;
}

.footer-bottom a:hover {
    color: #667eea;
}

@media (max-width: 768px) {
    .footer-content {
        grid-template-columns: 1fr;
    }
    
    .newsletter-form {
        flex-direction: column;
    }
}
</style>
